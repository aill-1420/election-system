<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = [''];
    public $timestamps = false;







    // visitor relation
    public function visitor() {
        return $this->belongsTo(visitors::class);
    }
    // candidate relation
    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }
    // election relation
    public function election() {
        return $this->belongsTo(Election::class);
    }
}
