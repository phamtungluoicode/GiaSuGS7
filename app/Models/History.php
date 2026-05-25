<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    protected $fillable = ['id_client', 'coint', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_client');
    }
}
