<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TutorJob;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $jobs = TutorJob::where('id_user', Auth::id())
            ->with(['teacher', 'subjectModel', 'classLevel'])
            ->latest()
            ->paginate(10);

        return view('user.hire-history', compact('jobs'));
    }

    public function show($id)
    {
        $job = TutorJob::where('id_user', Auth::id())
            ->with(['teacher', 'subjectModel', 'classLevel'])
            ->findOrFail($id);

        return view('user.hire-detail', compact('job'));
    }
}
