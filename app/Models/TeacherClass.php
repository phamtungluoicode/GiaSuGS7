<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherClass extends Model
{
    use SoftDeletes;

    protected $table = 'teacher_class';

    protected $fillable = ['TeacherID', 'ClassID'];
}
