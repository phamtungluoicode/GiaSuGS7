<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $featuredTeachers = User::where('role', 'teacher')
            ->where('status', 1)
            ->with('subjects')
            ->latest()
            ->take(8)
            ->get();

        $stats = [
            'teachers' => User::where('role', 'teacher')->where('status', 1)->count(),
            'subjects' => Subject::count(),
            'students' => User::where('role', 'user')->count(),
        ];

        return view('home', compact('featuredTeachers', 'stats'));
    }
}
