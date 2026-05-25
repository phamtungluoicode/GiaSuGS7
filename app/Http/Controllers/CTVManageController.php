<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CTVManageController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'ctv');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $ctvs = $query->latest()->paginate(10);

        return view('admin.ctvs.index', compact('ctvs'));
    }

    public function create()
    {
        return view('admin.ctvs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable|string|max:191',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:191',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'role' => 'ctv',
            'status' => 1,
            'coin' => '0',
        ]);

        return redirect()->route('admin.ctvs.index')
            ->with('success', 'Thêm cộng tác viên thành công.');
    }

    public function edit($id)
    {
        $ctv = User::findOrFail($id);

        return view('admin.ctvs.edit', compact('ctv'));
    }

    public function update(Request $request, $id)
    {
        $ctv = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email,' . $ctv->id,
            'password' => 'nullable|min:6|confirmed',
            'phone' => 'nullable|string|max:191',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:191',
        ]);

        $data = $request->except(['password', 'password_confirmation']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $ctv->update($data);

        return redirect()->route('admin.ctvs.index')
            ->with('success', 'Cập nhật cộng tác viên thành công.');
    }

    public function destroy($id)
    {
        $ctv = User::findOrFail($id);
        $ctv->delete();

        return redirect()->route('admin.ctvs.index')
            ->with('success', 'Xóa cộng tác viên thành công.');
    }
}
