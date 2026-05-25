<?php

namespace App\Http\Controllers;

use App\Models\ClassLevel;
use Illuminate\Http\Request;

class ClassLevelController extends Controller
{
    public function index()
    {
        $classLevels = ClassLevel::latest()->paginate(10);

        return view('admin.class-levels.index', compact('classLevels'));
    }

    public function create()
    {
        return view('admin.class-levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required|string|max:191|unique:class_levels,class',
        ]);

        ClassLevel::create([
            'class' => $request->class,
        ]);

        return redirect()->route('admin.class-levels.index')
            ->with('success', 'Thêm lớp học thành công.');
    }

    public function edit($id)
    {
        $classLevel = ClassLevel::findOrFail($id);

        return view('admin.class-levels.edit', compact('classLevel'));
    }

    public function update(Request $request, $id)
    {
        $classLevel = ClassLevel::findOrFail($id);

        $request->validate([
            'class' => 'required|string|max:191|unique:class_levels,class,' . $classLevel->id,
        ]);

        $classLevel->update([
            'class' => $request->class,
        ]);

        return redirect()->route('admin.class-levels.index')
            ->with('success', 'Cập nhật lớp học thành công.');
    }

    public function destroy($id)
    {
        $classLevel = ClassLevel::findOrFail($id);
        $classLevel->delete();

        return redirect()->route('admin.class-levels.index')
            ->with('success', 'Xóa lớp học thành công.');
    }
}
