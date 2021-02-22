<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\CandidateLogin;
use App\Http\Requests\Candidate\CandidateRegister;
use App\Models\Candidate;
use Illuminate\Http\Request;

class authController extends Controller
{
    // register candidate view
    public function candidateRegisterView() {
        return view('site.candidate.auth.register');
    }
    // register candidate
    public function candidateRegister(CandidateRegister $request) {
        $fileName = NULL;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'candidate');
        }
        $candidate = Candidate::create([
            'name'                   => $request->input('name'),
            'username'               => $request->input('username'),
            'email'                  => $request->input('email'),
            'password'               => bcrypt($request->input('password')),
            'phone_number'           => $request->input('phone'),
            'reason_of_nomination'   => $request->input('description'),
            'image'                  => $fileName,
            'created_at'             => now()
        ]);
        $candidate->election()->attach($request->input('election'));
        auth('candidate')->login($candidate);
        return redirect()->to(route('candidate.dashboard'));
    }

    // login view
    public function loginCandidateView() {
        return view('site.candidate.auth.login');
    }

    // login candidate
    public function login(CandidateLogin $request) {
        if(auth('candidate')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')])) {
            return redirect()->to(route('candidate.dashboard'));
        }
        return redirect()->back();
    }

    // logout
    public function logout() {
        auth('candidate')->logout();
        return redirect()->to(route('candidate.login.view'));
    }
}
