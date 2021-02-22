<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Election\ElectionRegister;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::orderBy('id' , 'DESC')->paginate($this->paginate);
        return view('dashboard.admin.election.index' , compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.election.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElectionRegister $request)
    {
        $request['created_at'] = now();
        $request->has('status') ? $request['status'] = 1 : $request['status'] = 0;
        $election = Election::create($request->all());
        return redirect()->to(route('election.index'))->with(['success' => 'add election successfully']);
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
        $election = Election::findOrFail($id);
        return view('dashboard.admin.election.edit' , compact('election'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ElectionRegister $request, $id)
    {
        $election = Election::findOrFail($id);
        $election->update($request->all());
        return redirect()->back()->with(['success' => 'update election successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $election = Election::findOrFail($id);
        $election->update(['status' => 0]);
        return redirect()->back()->with(['success' => 'add election successfully']);
    }

    // all votes
    public function AllVotes($id) {
        $election_votes = Vote::where('election_id' , $id)->paginate($this->paginate + 10);
        return view('dashboard.admin.election.all_votes' , compact('election_votes'));
    }


}
