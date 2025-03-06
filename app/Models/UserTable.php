<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vendors;
use App\Models\EventManager;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTable extends Authenticatable
{
    protected $table = "user_table";
    protected $primaryKey = 'user_id';

    public function vendors()
    {
        return $this->hasMany(Vendors::class, 'user_id', 'user_id');
    }


    public function eventManagers()
    {
        return $this->hasMany(EventManager::class, 'user_id', 'user_id');
    }
}

