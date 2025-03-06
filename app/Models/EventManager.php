<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventManager extends Model
{
    protected $table = "event_manager";
    protected $primaryKey = 'em_id';

    public function user()
    {
        return $this->belongsTo(UserTable::class, 'user_id', 'user_id');
    }
}
