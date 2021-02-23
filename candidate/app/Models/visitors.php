<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class visitors extends Authenticatable
{
    protected $guarded = [''];
    public $timestamps = false;



    // relation votes
    public function votes() {
        return $this->hasMany(Vote::class , 'visitor_id');
    }
}
