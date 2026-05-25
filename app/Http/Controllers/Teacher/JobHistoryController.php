<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Mail\AcceptTeachingMail;
use App\Mail\RejectTeachingMail;
use App\Models\TutorJob;
use App\Models\Connect;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class JobHistoryController extends Controller
{
    public function index()
    {
        $jobs = TutorJob::where('id_teacher', Auth::id())
            ->with(['user', 'subjectModel', 'classLevel'])
            ->latest()
            ->paginate(10);

        return view('teacher.job-history', compact('jobs'));
    }

    public function show($id)
    {
        $job = TutorJob::where('id_teacher', Auth::id())
            ->with(['user', 'subjectModel', 'classLevel'])
            ->findOrFail($id);

        return view('teacher.job-detail', compact('job'));
    }

    private const HIRE_COST = 100;

    public function accept($id)
    {
        $job = TutorJob::where('id_teacher', Auth::id())->with('user')->findOrFail($id);
        $teacher = Auth::user();
        $fee = 50;

        if ($teacher->coin < $fee) {
            return redirect('/payment/deposit')
                ->with('error', 'Bạn không đủ coin. Vui lòng nạp thêm để kết nối dạy.');
        }

        DB::transaction(function () use ($job, $teacher, $fee) {
            $job->update(['status' => 1]);

            Connect::create([
                'id_job' => $job->id,
                'id_user' => $job->id_user,
                'id_teacher' => $teacher->id,
                'status' => 1,
            ]);

            $teacher->update(['coin' => $teacher->coin - $fee]);

            History::create([
                'id_client' => $teacher->id,
                'coint' => -$fee,
                'type' => 'Nhận lớp - Job #' . $job->id,
            ]);
        });

        Mail::to($job->user->email)->send(new AcceptTeachingMail([
            'teacher_name' => $teacher->name,
            'teacher_phone' => $teacher->phone,
            'teacher_email' => $teacher->email,
        ]));

        return redirect()->back()->with('success', 'Bạn đã đồng ý nhận lớp thành công.');
    }

    public function reject($id)
    {
        $job = TutorJob::where('id_teacher', Auth::id())->with('user')->findOrFail($id);
        $teacher = Auth::user();

        DB::transaction(function () use ($job) {
            $job->update(['status' => 2]);

            $hirer = $job->user;
            $refund = self::HIRE_COST;
            $hirer->update(['coin' => $hirer->coin + $refund]);

            History::create([
                'id_client' => $hirer->id,
                'coint' => $refund,
                'type' => 'Hoàn tiền - Gia sư từ chối Job #' . $job->id,
            ]);
        });

        Mail::to($job->user->email)->send(new RejectTeachingMail($teacher->name));

        return redirect()->back()->with('success', 'Bạn đã từ chối lớp này.');
    }
}
