<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class admins extends Authenticatable
{
    protected $guarded = [''];
    public $timestamps = false;
}
