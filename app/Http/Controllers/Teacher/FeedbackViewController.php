<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackViewController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::where('id_teacher', Auth::id())
            ->with('sender')
            ->latest()
            ->paginate(10);

        return view('teacher.feedbacks', compact('feedbacks'));
    }
}
