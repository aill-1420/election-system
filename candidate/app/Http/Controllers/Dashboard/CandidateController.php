<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\CandidateRegister;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::with('election')->orderBy('id' , 'DESC')->paginate($this->paginate);
        return view('dashboard.admin.candidate.index' , compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRegister $request)
    {
        $fileName = NULL;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'candidate');
        }
        $candidate = Candidate::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number'  => $request->input('phone'),
            'reason_of_nomination' => $request->input('description'),
            'image' => $fileName,
            'created_at' => now()
        ]);
        $candidate->election()->attach($request->input('election'));
        return redirect()->to(route('candidate.index'))->with(['success' => 'added candidate successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('dashboard.admin.candidate.edit' , compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:200',
            'username'    => 'required|string|max:200',
            'email'       => 'required|string|max:200|email',
            'description' => 'required|string',
            'image'       => 'nullable|mimes:jpg,png,jpeg',
        ]);
        $candidate = Candidate::findOrFail($id);
        $fileName = '';
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'candidate');
            Storage::delete('public/candidate/'.$candidate->image);
        }
        $candidate->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number'  => $request->input('phone'),
            'reason_of_nomination' => $request->input('description'),
            'election_id'   => $request->input('election'),
            'image' => $fileName ? $fileName : $candidate->image,
        ]);
        return redirect()->to(route('candidate.index'))->with(['success' => 'update candidate successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        if($candidate->delete()) {
            Storage::delete('public/candidate/'.$candidate->image);
            return redirect()->back()->with(['success' => 'deleted successfully']);
        }
    }
}
