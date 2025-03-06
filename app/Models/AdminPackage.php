<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPackage extends Model
{
    use SoftDeletes;

    protected $table = "adminpackage";
    protected $primaryKey = 'ap_id';

}
