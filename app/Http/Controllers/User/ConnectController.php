<?php

namespace App\Http\Controllers\User;

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
        $connects = Connect::where('id_user', Auth::id())
            ->with(['teacher', 'job.subjectModel'])
            ->latest()
            ->paginate(10);

        return view('user.connects', compact('connects'));
    }

    public function confirm($id)
    {
        $connect = Connect::where('id_user', Auth::id())->with(['teacher'])->findOrFail($id);

        $connect->update(['confirm_user' => 1]);

        if ($connect->confirm_user == 1 && $connect->confirm_teacher == 1) {
            $user = Auth::user();
            $refund = (int) (self::HIRE_COST * 0.5);

            DB::transaction(function () use ($connect, $user, $refund) {
                $connect->update(['status' => 2]);

                $user->update(['coin' => $user->coin + $refund]);

                History::create([
                    'id_client' => $user->id,
                    'coint' => $refund,
                    'type' => 'Hoàn tiền kết nối thành công',
                ]);
            });

            $connectionData = [
                'user_name' => $user->name,
                'teacher_name' => $connect->teacher->name,
            ];
            Mail::to($user->email)->send(new ConnectionConfirmMail($connectionData));
            Mail::to($connect->teacher->email)->send(new ConnectionConfirmMail($connectionData));
        }

        return redirect()->back()->with('success', 'Xác nhận kết nối thành công.');
    }

    public function deny($id)
    {
        $connect = Connect::where('id_user', Auth::id())->findOrFail($id);
        $user = Auth::user();
        $refund = (int) (self::HIRE_COST * 0.8);

        DB::transaction(function () use ($connect, $user, $refund) {
            $connect->update(['confirm_user' => 2]);
            $user->update(['coin' => $user->coin + $refund]);

            History::create([
                'id_client' => $user->id,
                'coint' => $refund,
                'type' => 'Hoàn tiền từ chối kết nối',
            ]);
        });

        return redirect()->back()->with('success', 'Đã từ chối kết nối. Hoàn lại ' . $refund . ' coin.');
    }
}
