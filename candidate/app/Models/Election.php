<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $guarded = [''];
    public $timestamps = false;


    // votes
    public function votes() {
        return $this->hasMany(Vote::class);
    }

    // status
    public function scopeStatus() {
        return $this->status == 1 ? "<button class='btn btn-sm btn-info' disabled>open</button>" : "<button class='btn btn-sm btn-danger' disabled>close</button>";
    }

    // relation pivot election
    public function candidate() {
        return $this->belongsToMany(Candidate::class , 'election_candidate'  ,'election_id' , 'candidate_id');
    }
}
