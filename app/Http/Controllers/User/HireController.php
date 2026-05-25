<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\HireRequest;
use App\Mail\HireNotificationMail;
use App\Models\User;
use App\Models\TutorJob;
use App\Models\History;
use App\Models\Subject;
use App\Models\ClassLevel;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HireController extends Controller
{
    public function showHireForm($teacherId)
    {
        $teacher = User::where('role', 'teacher')
            ->where('status', 1)
            ->findOrFail($teacherId);

        $teacher->load(['subjects', 'classLevels']);

        return view('user.hire', compact('teacher'));
    }

    private const HIRE_COST = 100;

    public function hire(HireRequest $request, $teacherId)
    {
        $user = Auth::user();

        if ($user->coin < self::HIRE_COST) {
            return redirect('/payment/deposit')->with('error', 'Số dư không đủ. Vui lòng nạp thêm coin.');
        }

        $duplicate = TutorJob::where('id_user', $user->id)
            ->where('id_teacher', $teacherId)
            ->where('subject', $request->subject)
            ->where('status', '!=', 2)
            ->exists();

        if ($duplicate) {
            return redirect()->back()->with('error', 'Bạn đã gửi yêu cầu thuê gia sư này cho môn học này rồi.');
        }

        $teacher = User::findOrFail($teacherId);

        DB::transaction(function () use ($user, $teacher, $request, $teacherId) {
            TutorJob::create([
                'id_user' => $user->id,
                'id_teacher' => $teacherId,
                'subject' => $request->subject,
                'class' => $request->class,
                'description' => $request->description,
                'status' => 0,
            ]);

            $user->update(['coin' => $user->coin - self::HIRE_COST]);

            History::create([
                'id_client' => $user->id,
                'coint' => -self::HIRE_COST,
                'type' => 'Thuê gia sư',
            ]);
        });

        $subjectName = Subject::find($request->subject)->name ?? $request->subject;
        $className = ClassLevel::find($request->class)->class ?? $request->class;

        Mail::to($teacher->email)->send(new HireNotificationMail([
            'user_name' => $user->name,
            'subject' => $subjectName,
            'class' => $className,
        ]));

        app(TelegramService::class)->notifyNewHire($user->name, $teacher->name, $subjectName, $className);

        return redirect()->route('user.history')->with('success', 'Thuê gia sư thành công. Đã trừ ' . self::HIRE_COST . ' coin.');
    }
}
