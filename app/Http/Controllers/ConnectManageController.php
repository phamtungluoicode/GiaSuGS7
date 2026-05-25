<?php

namespace App\Http\Controllers;

use App\Models\Connect;

class ConnectManageController extends Controller
{
    public function index()
    {
        $connects = Connect::with(['job', 'user', 'teacher'])->latest()->paginate(10);

        return view('admin.connects.index', compact('connects'));
    }
}
