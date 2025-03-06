<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $table = "vendors";
    protected $primaryKey = 'vendor_id';

    public function user()
    {
        return $this->belongsTo(UserTable::class, 'user_id', 'user_id');
    }

    public function services()
    {
        return $this->hasMany(Services::class, 'vendor_id', 'vendor_id');
    }
}

