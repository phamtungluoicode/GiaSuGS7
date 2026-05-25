<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;

    protected $table = 'feedback';

    protected $fillable = ['id_sender', 'id_teacher', 'point', 'description'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'id_sender');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'id_teacher');
    }
}
