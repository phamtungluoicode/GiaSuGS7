<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorySendEmail extends Model
{
    protected $table = 'history_send_emails';

    protected $fillable = ['id_user', 'email', 'type', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
