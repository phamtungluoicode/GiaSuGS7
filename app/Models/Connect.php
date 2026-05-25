<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    protected $fillable = [
        'id_job', 'id_user', 'id_teacher', 'note_user', 'note_teacher',
        'confirm_user', 'confirm_teacher', 'status',
    ];

    public function job()
    {
        return $this->belongsTo(TutorJob::class, 'id_job');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'id_teacher');
    }
}
