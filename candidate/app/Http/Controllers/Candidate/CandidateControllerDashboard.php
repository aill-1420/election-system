<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;

class CandidateControllerDashboard extends Controller
{
    public function dashboard() {
        $candidate = Candidate::find(auth('candidate')->id());
        return view('site.candidate.dashboard' , compact('candidate'));
    }

    // all candidate
    public function myElection() {
        $candidate = Candidate::find(auth('candidate')->id());
        return view('site.candidate.election.my-election' , compact('candidate'));
    }

    // all Election
    public function allElection() {
        return view('site.candidate.election.all-election');
    }
}
