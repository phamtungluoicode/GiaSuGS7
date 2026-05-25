<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class FeedbackManageController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with(['sender', 'teacher'])->latest()->paginate(10);
        // dd($feedbacks);
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('admin.feedbacks.index')
            ->with('success', 'Xóa đánh giá thành công.');
    }
}
