<?php

namespace App\Http\Controllers;

use App\Models\Connect;

class ConnectManageController extends Controller
{
    public function index()
    {
        $connects = Connect::with(['job', 'user', 'teacher'])->latest()->paginate(10);
        // dd($connects);
        return view('admin.connects.index', compact('connects'));
    }
}
