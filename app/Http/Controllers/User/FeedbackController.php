<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\User;
use App\Models\Connect;
use App\Models\Feedback;
use App\Models\TutorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function create($teacherId)
    {
        $teacher = User::where('role', 'teacher')
            ->where('status', 1)
            ->findOrFail($teacherId);

        $hasHired = TutorJob::where('id_user', Auth::id())
            ->where('id_teacher', $teacherId)
            ->where('status', 1)
            ->exists();

        if (!$hasHired) {
            return redirect()->back()->with('error', 'Bạn cần thuê gia sư và được gia sư xác nhận dạy trước khi đánh giá.');
        }

        $alreadyFeedback = Feedback::where('id_sender', Auth::id())
            ->where('id_teacher', $teacherId)
            ->exists();

        if ($alreadyFeedback) {
            return redirect()->back()->with('error', 'Bạn đã đánh giá gia sư này rồi.');
        }

        return view('user.feedback', compact('teacher'));
    }

    public function store(FeedbackRequest $request, $teacherId)
    {
        $alreadyFeedback = Feedback::where('id_sender', Auth::id())
            ->where('id_teacher', $teacherId)
            ->exists();

        if ($alreadyFeedback) {
            return redirect()->back()->with('error', 'Bạn đã đánh giá gia sư này rồi.');
        }

        Feedback::create([
            'id_sender' => Auth::id(),
            'id_teacher' => $teacherId,
            'point' => $request->point,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Gửi đánh giá thành công. Cảm ơn bạn!');
    }
}
