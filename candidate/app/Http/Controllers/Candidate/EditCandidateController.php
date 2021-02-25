<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\CandidateUpdate;
use Illuminate\Http\Request;

class EditCandidateController extends Controller
{
    public function editAccountView() {
        return view('site.candidate.edit');
    }

    public function editAccount(CandidateUpdate $request) {
        $fileName = NULL;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'candidate');
        }
        $request['password'] = $request->input('password') ? bcrypt($request->input('password')) : auth('candidate')->user()->password;
        $request['phone_number'] = $request->input('phone');
        auth('candidate')->user()->update($request->all());
        return redirect()->back()->with(['success' => 'updated information successfully']);
    }
}
