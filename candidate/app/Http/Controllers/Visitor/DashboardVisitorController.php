<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardVisitorController extends Controller
{
    // visitor dashboard
    public function dashboard() {
        $elections = Election::orderBy('id' , 'DESC')->where('status' , 1)->where('end_date' , '>' , Carbon::now()->toDateString())->get();
        return view('site.visitor.dashboard' , compact('elections'));
    }

    // all nomination in election
    public function nomination($id) {
        $elections = Election::findOrFail($id);
        return view('site.visitor.candidate.candidate' , compact('elections'));
    }

    // nomination to candidate
    public function nominationToCandidate($id , $election) {
        $candidate = Candidate::findOrFail($id);
        $election  = Election::findOrFail($election);
        return view('site.visitor.candidate.nomination_candidate' , compact('candidate' , 'election'));
    }

    // nomination save
    public function nominationSave(Request $request) {
        $request->validate([
            'candidate' => 'required|integer|exists:candidates,id',
            'election'  => 'required|integer|exists:elections,id'
        ]);
        if(auth('visitor')->user()->votes()->where(['election_id' => $request->input('election') , 'candidate_id' => $request->input('candidate')])->exists()) {
            return redirect()->back()->with(['error' => 'you are already vote you can\'t vote again']);
        }
        auth('visitor')->user()->votes()->create(['election_id' => $request->input('election') , 'candidate_id' => $request->input('candidate')]);
        return redirect()->back()->with(['success' => 'voted successfully']);
    }
}
