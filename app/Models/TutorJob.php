<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TutorJob extends Model
{
    use SoftDeletes;

    protected $table = 'tutor_jobs';

    protected $fillable = [
        'id_user', 'id_teacher', 'subject', 'class', 'status', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'id_teacher');
    }

    public function subjectModel()
    {
        return $this->belongsTo(Subject::class, 'subject');
    }

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class, 'class');
    }

    public function connect()
    {
        return $this->hasOne(Connect::class, 'id_job');
    }
    public function client()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function userHired()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // 2. Quan hệ lấy thông tin gia sư
    public function teacherHired()
    {
        return $this->belongsTo(User::class, 'id_teacher', 'id');
    }

    // 3. Quan hệ lấy thông tin môn học từ bảng subjects
    public function subjectModelHired()
    {
        return $this->belongsTo(Subject::class, 'subject', 'id');
    }
}
