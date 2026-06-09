<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\TelegramService;
class ApprovalController extends Controller
{
    public function index()
    {
        $pendingTeachers = User::where('role', 'teacher')
            ->where('status', 0)
            ->latest()
            ->paginate(10);

        return view('admin.approvals.index', compact('pendingTeachers'));
    }

    public function show($id)
    {
        $teacher = User::findOrFail($id);

        return view('admin.approvals.show', compact('teacher'));
    }

    public function approve($id)
    {
        $teacher = User::findOrFail($id);
        $message = "approve gia su";
        $teacher->update([
            'status' => 1,
            'assign_user' => Auth::user()->name,
            'time_accept' => now(),
            'approved_by' => Auth::id(),
        ]);
        app(TelegramService::class)->notifyTeacherApproved(
            $teacher->name,
            $teacher->email,
            Auth::user()->name,
            $message
        );
        return redirect()->route('admin.approvals.index')
            ->with('success', 'Duyệt gia sư thành công.');
    }

    public function reject($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->update(['status' => 2]);
        $message = "reject gia su";
        app(TelegramService::class)->notifyTeacherApproved(
            $teacher->name,
            $teacher->email,
            Auth::user()->name,
            $message
        );
        return redirect()->route('admin.approvals.index')
            ->with('success', 'Từ chối gia sư thành công.');
    }
}
