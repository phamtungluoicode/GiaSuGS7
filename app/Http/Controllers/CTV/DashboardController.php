<?php

namespace App\Http\Controllers\CTV;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $pendingCount = User::where('role', 'teacher')->where('status', 0)->count();
        $approvedCount = User::where('role', 'teacher')->where('status', 1)->count();

        return view('ctv.dashboard', compact('pendingCount', 'approvedCount'));
    }
}
