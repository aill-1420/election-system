<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;

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
        $elections = Election::orderBy('id' , 'DESC')->where('status' , 1)->where('end_date' , '>' , Carbon::now()->toDateString())->get();
        return view('site.candidate.election.all-election' , compact('elections'));
    }

    // nomination
    public function nomination($id) {
        $election = Election::findOrFail($id);;
        return view('site.candidate.election.nomination' , compact('election'));
    }

    // nomination post
    public function nominationPost(Request $request) {
        $request->validate([
           'election' => 'required|integer|exists:elections,id'
        ]);
        if(auth('candidate')->user()->election()->where(['election_id' => $request->input('election') ,
            'candidate_id' => auth()->id()])->exists()) {
            return redirect()->back()->with(['error' => 'you are already nomination in this election']);
        }
        auth('candidate')->user()->election()->attach($request->input('election'));
        return redirect()->back()->with(['success' => 'you are nomination in this election successfully']);
    }
}
