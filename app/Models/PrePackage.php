<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrePackage extends Model
{
    use SoftDeletes;

    protected $table = "pre_packages";
    protected $primaryKey = 'package_id';

    public function vendor()
    {
        return $this->belongsTo(Vendors::class, 'vendor_id', 'vendor_id');
    }

    public function eventmanager()
    {
        return $this->belongsTo(EventManager::class, 'em_id', 'em_id');
    }
}
