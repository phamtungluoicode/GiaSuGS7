<?php

namespace App\Http\Controllers;

use App\Models\TutorJob;

class JobController extends Controller
{
    public function index()
    {
        $jobs = TutorJob::with(['user', 'teacher'])->latest()->paginate(10);

        return view('admin.jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = TutorJob::with(['user', 'teacher'])->findOrFail($id);

        return view('admin.jobs.show', compact('job'));
    }
}
