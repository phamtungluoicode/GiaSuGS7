<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::latest()->paginate(10);

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191|unique:subjects,name',
        ]);

        Subject::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Thêm môn học thành công.');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);

        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:191|unique:subjects,name,' . $subject->id,
        ]);

        $subject->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Cập nhật môn học thành công.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Xóa môn học thành công.');
    }
}
