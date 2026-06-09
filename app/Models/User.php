<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'gender',
        'date_of_birth',
        'avatar',
        'phone',
        'address',
        'coin',
        'school_id',
        'Citizen_card',
        'education_level',
        'class_id',
        'subject',
        'salary_id',
        'exp',
        'current_role',
        'description',
        'time_tutor_id',
        'status',
        'DistrictID',
        'latitude',
        'longitude',
        'google_id',
        'Certificate',
        'assign_user',
        'Certificate_public',
        'code',
        'time_accept',
        'approved_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
            'time_accept' => 'datetime',
        ];
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'DistrictID');
    }

    public function subjectModel()
    {
        return $this->belongsTo(Subject::class, 'subject');
    }

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class, 'class_id');
    }

    public function rankSalary()
    {
        return $this->belongsTo(RankSalary::class, 'salary_id');
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_tutor_id');
    }

    public function tutorJobs()
    {
        return $this->hasMany(TutorJob::class, 'id_user');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'id_client');
    }

    public function feedbacksSent()
    {
        return $this->hasMany(Feedback::class, 'id_sender');
    }

    public function connects()
    {
        return $this->hasMany(Connect::class, 'id_user');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject', 'TeacherID', 'SubjectID')
            ->wherePivotNull('deleted_at');
    }

    public function classLevels()
    {
        return $this->belongsToMany(ClassLevel::class, 'teacher_class', 'TeacherID', 'ClassID')
            ->wherePivotNull('deleted_at');
    }
}
