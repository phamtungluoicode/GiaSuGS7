<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Subject;
use App\Models\ClassLevel;
use App\Models\TimeSlot;
use App\Models\RankSalary;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('teacher.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        $schools = School::all();
        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        $timeSlots = TimeSlot::all();
        $rankSalaries = RankSalary::all();
        $districts = District::all();

        return view('teacher.edit-profile', compact(
            'user', 'schools', 'subjects', 'classLevels', 'timeSlots', 'rankSalaries', 'districts'
        ));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'nullable|string|max:191',
            'address' => 'nullable|string|max:191',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'description' => 'nullable|string',
            'exp' => 'nullable|string|max:191',
            'education_level' => 'nullable|string|max:191',
            'school_id' => 'nullable|integer|exists:schools,id',
            'DistrictID' => 'nullable|integer|exists:districts,id',
            'salary_id' => 'nullable|integer|exists:rank_salaries,id',
            'subjects' => 'nullable|array',
            'subjects.*' => 'integer|exists:subjects,id',
            'class_ids' => 'nullable|array',
            'class_ids.*' => 'integer|exists:class_levels,id',
            'time_tutor_id' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'Certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->only([
            'name', 'phone', 'address', 'gender', 'date_of_birth',
            'description', 'exp', 'education_level', 'school_id',
            'DistrictID', 'salary_id', 'time_tutor_id',
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar && !str_starts_with($user->avatar, 'http')) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('uploads/avatars', 'public');
        }

        if ($request->hasFile('Certificate')) {
            if ($user->Certificate && !str_starts_with($user->Certificate, 'http')) {
                Storage::disk('public')->delete($user->Certificate);
            }
            $data['Certificate'] = $request->file('Certificate')->store('uploads/certificates', 'public');
        }

        $user->update($data);

        $user->subjects()->sync($request->subjects ?? []);
        $user->classLevels()->sync($request->class_ids ?? []);

        return redirect()->route('teacher.profile')->with('success', 'Cập nhật thông tin thành công.');
    }
}
