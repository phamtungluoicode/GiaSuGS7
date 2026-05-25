<?php

namespace App\Http\Controllers;

use App\Models\RankSalary;
use Illuminate\Http\Request;

class RankSalaryController extends Controller
{
    public function index()
    {
        $rankSalaries = RankSalary::latest()->paginate(10);

        return view('admin.rank-salaries.index', compact('rankSalaries'));
    }

    public function create()
    {
        return view('admin.rank-salaries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191|unique:rank_salaries,name',
        ]);

        RankSalary::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.rank-salaries.index')
            ->with('success', 'Thêm mức lương thành công.');
    }

    public function edit($id)
    {
        $rankSalary = RankSalary::findOrFail($id);

        return view('admin.rank-salaries.edit', compact('rankSalary'));
    }

    public function update(Request $request, $id)
    {
        $rankSalary = RankSalary::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:191|unique:rank_salaries,name,' . $rankSalary->id,
        ]);

        $rankSalary->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.rank-salaries.index')
            ->with('success', 'Cập nhật mức lương thành công.');
    }

    public function destroy($id)
    {
        $rankSalary = RankSalary::findOrFail($id);
        $rankSalary->delete();

        return redirect()->route('admin.rank-salaries.index')
            ->with('success', 'Xóa mức lương thành công.');
    }
}
