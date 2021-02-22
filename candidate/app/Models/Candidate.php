<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Authenticatable
{
    protected $guarded = [''];
    public $timestamps = false;








    // relation pivot election
    public function election() {
        return $this->belongsToMany(Election::class , 'election_candidate');
    }
}
