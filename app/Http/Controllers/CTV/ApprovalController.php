<?php

namespace App\Http\Controllers\CTV;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index()
    {
        $pendingTeachers = User::where('role', 'teacher')
            ->where('status', 0)
            ->latest()
            ->paginate(10);

        return view('ctv.approvals.index', compact('pendingTeachers'));
    }

    public function show($id)
    {
        $teacher = User::findOrFail($id);

        return view('ctv.approvals.show', compact('teacher'));
    }

    public function approve($id)
    {
        $teacher = User::findOrFail($id);

        $teacher->update([
            'status' => 1,
            'assign_user' => Auth::user()->name,
            'time_accept' => now(),
            'approved_by' => Auth::id(),
        ]);

        return redirect()->route('ctv.approvals.index')
            ->with('success', 'Duyệt gia sư thành công.');
    }

    public function reject($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->update(['status' => 2]);

        return redirect()->route('ctv.approvals.index')
            ->with('success', 'Từ chối gia sư thành công.');
    }
}
