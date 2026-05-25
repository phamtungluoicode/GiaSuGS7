<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\ClassLevel;
use App\Models\District;
use App\Models\TimeSlot;
use App\Models\RankSalary;
use App\Models\Feedback;
use App\Models\Connect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')
            ->where('status', 1)
            ->with(['subjects', 'classLevels'])
            ->latest()
            ->paginate(12);

        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        $districts = District::all();
        $timeSlots = TimeSlot::all();
        $rankSalaries = RankSalary::all();

        return view('tutors.index', compact(
            'teachers', 'subjects', 'classLevels', 'districts', 'timeSlots', 'rankSalaries'
        ));
    }

    public function search(Request $request)
    {
        $query = User::where('role', 'teacher')->where('status', 1);

        if ($request->filled('subject')) {
            $query->whereHas('subjects', function ($q) use ($request) {
                $q->where('subjects.id', $request->subject);
            });
        }

        if ($request->filled('class_id')) {
            $query->whereHas('classLevels', function ($q) use ($request) {
                $q->where('class_levels.id', $request->class_id);
            });
        }

        if ($request->filled('DistrictID')) {
            $query->where('DistrictID', $request->DistrictID);
        }

        if ($request->filled('time_tutor_id')) {
            $query->where('time_tutor_id', $request->time_tutor_id);
        }

        if ($request->filled('salary_id')) {
            $query->where('salary_id', $request->salary_id);
        }

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%")
                  ->orWhere('address', 'like', "%{$keyword}%");
            });
        }

        $teachers = $query->with(['subjects', 'classLevels'])->latest()->paginate(12)->appends($request->query());

        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        $districts = District::all();
        $timeSlots = TimeSlot::all();
        $rankSalaries = RankSalary::all();

        return view('tutors.index', compact(
            'teachers', 'subjects', 'classLevels', 'districts', 'timeSlots', 'rankSalaries'
        ));
    }

    public function show($id)
    {
        $teacher = User::where('role', 'teacher')
            ->where('status', 1)
            ->with(['subjects', 'classLevels'])
            ->findOrFail($id);

        $averageRating = Feedback::where('id_teacher', $teacher->id)->avg('point');

        $feedbacks = Feedback::where('id_teacher', $teacher->id)
            ->with('sender')
            ->latest()
            ->get();

        $hasConfirmedConnection = false;
        if (Auth::check()) {
            $hasConfirmedConnection = Connect::where('id_user', Auth::id())
                ->where('id_teacher', $teacher->id)
                ->where('status', 1)
                ->exists();
        }
        // dd($teacher);
        return view('tutors.show', compact('teacher', 'averageRating', 'feedbacks', 'hasConfirmedConnection'));
    }
}
