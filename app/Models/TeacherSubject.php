<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherSubject extends Model
{
    use SoftDeletes;

    protected $table = 'teacher_subject';

    protected $fillable = ['TeacherID', 'SubjectID'];
}
