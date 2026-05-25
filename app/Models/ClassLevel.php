<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassLevel extends Model
{
    use SoftDeletes;

    protected $table = 'class_levels';

    protected $fillable = ['class'];
}
