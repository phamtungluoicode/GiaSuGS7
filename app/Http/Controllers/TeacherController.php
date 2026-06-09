<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Subject;
use App\Models\TutorJob;
use App\Models\ClassLevel;
use App\Models\TimeSlot;
use App\Models\RankSalary;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeRegistrationMail;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'teacher')->where('status', 1);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $teachers = $query->latest()->paginate(10);

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $schools = School::all();
        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        $timeSlots = TimeSlot::all();
        $rankSalaries = RankSalary::all();
        $districts = District::all();

        return view('admin.teachers.create', compact(
            'schools',
            'subjects',
            'classLevels',
            'timeSlots',
            'rankSalaries',
            'districts'
        ));
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
            'Citizen_card' => 'nullable|string|max:191',
            'education_level' => 'nullable|string|max:191',
            'school_id' => 'nullable|integer|exists:schools,id',
            'exp' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'DistrictID' => 'nullable|integer|exists:districts,id',
            'salary_id' => 'nullable|integer|exists:rank_salaries,id',
            'subject' => 'nullable|string',
            'class_id' => 'nullable|string',
            'time_tutor_id' => 'nullable|string',
            'Certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $certificatePath = null;
        if ($request->hasFile('Certificate')) {
            $certificatePath = $request->file('Certificate')->store('uploads/certificates', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'role' => 'teacher',
            'status' => 1,
            'coin' => '0',
            'Citizen_card' => $request->Citizen_card,
            'education_level' => $request->education_level,
            'school_id' => $request->school_id,
            'exp' => $request->exp,
            'description' => $request->description,
            'DistrictID' => $request->DistrictID,
            'salary_id' => $request->salary_id,
            'subject' => $request->subject,
            'class_id' => $request->class_id,
            'time_tutor_id' => $request->time_tutor_id,
            'Certificate' => $certificatePath,
        ]);
        if ($request->subjects) {
            $user->subjects()->sync($request->subjects);
        }
        if ($request->class_ids) {
            $user->classLevels()->sync($request->class_ids);
        }
        Mail::to($user->email)->send(new WelcomeRegistrationMail([
            'name' => $user->name,
            'email' => $user->email,
            'role' => 'teacher',
        ]));

        app(TelegramService::class)->notifyNewRegistration($user->name, $user->email, 'teacher', $user->phone);
        return redirect()->route('admin.teachers.index')
            ->with('success', 'Thêm gia sư thành công.');
    }

    // public function show($id)
    // {
    //     $teacher = User::findOrFail($id);
    //     // dd($teacher);
    //     return view('admin.teachers.show', compact('teacher'));
    // }

    public function show($id)
    {
        $teacher = User::findOrFail($id);

        $jobs = TutorJob::with('user')
            ->where('id_teacher', $id)
            ->latest()
            ->get();

        return view('admin.teachers.show', compact('teacher', 'jobs'));
    }

    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        $schools = School::all();
        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        $timeSlots = TimeSlot::all();
        $rankSalaries = RankSalary::all();
        $districts = District::all();
        return view('admin.teachers.edit', compact(
            'teacher',
            'schools',
            'subjects',
            'classLevels',
            'timeSlots',
            'rankSalaries',
            'districts'
        ));
    }

    public function update(Request $request, $id)
    {
        $teacher = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email,' . $teacher->id,
            'password' => 'nullable|min:6|confirmed',
            'phone' => 'nullable|string|max:191',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:191',
            'Citizen_card' => 'nullable|string|max:191',
            'education_level' => 'nullable|string|max:191',
            'school_id' => 'nullable|integer|exists:schools,id',
            'exp' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'DistrictID' => 'nullable|integer|exists:districts,id',
            'salary_id' => 'nullable|integer|exists:rank_salaries,id',
            'subject' => 'nullable|string',
            'class_id' => 'nullable|string',
            'time_tutor_id' => 'nullable|string',
            'Certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->except(['password', 'password_confirmation', 'Certificate']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('Certificate')) {
            $data['Certificate'] = $request->file('Certificate')->store('uploads/certificates', 'public');
        }

        $teacher->update($data);
        $teacher->subjects()->sync($request->subjects ?? []);
        $teacher->classLevels()->sync($request->class_ids ?? []);
        return redirect()->route('admin.teachers.index')
            ->with('success', 'Cập nhật gia sư thành công.');
    }

    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Xóa gia sư thành công.');
    }
}
