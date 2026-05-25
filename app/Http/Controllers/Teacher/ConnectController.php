<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Mail\ConnectionConfirmMail;
use App\Models\Connect;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ConnectController extends Controller
{
    private const HIRE_COST = 100;

    public function index()
    {
        $connects = Connect::where('id_teacher', Auth::id())
            ->with(['user', 'job.subjectModel'])
            ->latest()
            ->paginate(10);

        return view('teacher.connects', compact('connects'));
    }

    public function confirm($id)
    {
        $connect = Connect::where('id_teacher', Auth::id())->with(['user'])->findOrFail($id);

        $connect->update(['confirm_teacher' => 1]);

        if ($connect->confirm_user == 1 && $connect->confirm_teacher == 1) {
            $teacher = Auth::user();
            $hirer = $connect->user;
            $refund = (int) (self::HIRE_COST * 0.5);

            DB::transaction(function () use ($connect, $hirer, $refund) {
                $connect->update(['status' => 2]);

                $hirer->update(['coin' => $hirer->coin + $refund]);

                History::create([
                    'id_client' => $hirer->id,
                    'coint' => $refund,
                    'type' => 'Hoàn tiền kết nối thành công',
                ]);
            });

            $connectionData = [
                'user_name' => $hirer->name,
                'teacher_name' => $teacher->name,
            ];
            Mail::to($hirer->email)->send(new ConnectionConfirmMail($connectionData));
            Mail::to($teacher->email)->send(new ConnectionConfirmMail($connectionData));
        }

        return redirect()->back()->with('success', 'Xác nhận kết nối thành công.');
    }
}
