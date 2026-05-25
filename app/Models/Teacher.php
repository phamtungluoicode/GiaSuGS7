<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'school_id', 'citizen_card', 'education_level', 'description',
        'time_tutor', 'status', 'DistrictID', 'Certificate',
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'DistrictID');
    }

    public function classLevels()
    {
        return $this->belongsToMany(ClassLevel::class, 'teacher_class', 'TeacherID', 'ClassID');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject', 'TeacherID', 'SubjectID');
    }

    public function tutorJobs()
    {
        return $this->hasMany(TutorJob::class, 'id_teacher');
    }

    public function connects()
    {
        return $this->hasMany(Connect::class, 'id_teacher');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'id_teacher');
    }
}
