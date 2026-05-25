<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::latest()->paginate(10);

        return view('admin.timeslots.index', compact('timeSlots'));
    }

    public function create()
    {
        return view('admin.timeslots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191|unique:time_slots,name',
        ]);

        TimeSlot::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.timeslots.index')
            ->with('success', 'Thêm khung giờ thành công.');
    }

    public function edit($id)
    {
        $timeSlot = TimeSlot::findOrFail($id);

        return view('admin.timeslots.edit', compact('timeSlot'));
    }

    public function update(Request $request, $id)
    {
        $timeSlot = TimeSlot::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:191|unique:time_slots,name,' . $timeSlot->id,
        ]);

        $timeSlot->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.timeslots.index')
            ->with('success', 'Cập nhật khung giờ thành công.');
    }

    public function destroy($id)
    {
        $timeSlot = TimeSlot::findOrFail($id);
        $timeSlot->delete();

        return redirect()->route('admin.timeslots.index')
            ->with('success', 'Xóa khung giờ thành công.');
    }
}
