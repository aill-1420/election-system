<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visitor\VisitorRegister;
use App\Http\Requests\Visitor\VisitorUpdate;
use App\Models\visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = visitors::orderBy('id' , 'DESC')->paginate($this->paginate);
        return view('dashboard.admin.visitor.index' , compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.visitor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorRegister $request)
    {
        $fileName = NULL;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'profile');
        }
        $visitor = visitors::create([
            'name'             => $request->input('name'),
            'username'         => $request->input('username'),
            'email'            => $request->input('email'),
            'password'         => bcrypt($request->input('password')),
            'phone_number'     => $request->input('phone'),
            'image'            => $fileName,
            'create_at'        => now(),
        ]);
        return redirect()->to(route('visitor.index'))->with(['success' => 'added Visitor successfully']);
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
        $visitor = visitors::findOrFail($id);
        return view('dashboard.admin.visitor.edit' , compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorUpdate $request, $id)
    {
        $visitor = visitors::findOrFail($id);
        $fileName = '';
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'profile');
            Storage::delete('public/profile/'.$visitor->image);
        }
        $visitor->update([
            'name'             => $request->input('name'),
            'username'         => $request->input('username'),
            'email'            => $request->input('email'),
            'password'         => $request->input('password') ? bcrypt($request->input('password')) : $visitor->password,
            'phone_number'     => $request->input('phone'),
            'image'            => $fileName != '' ? $fileName : $visitor->image,
        ]);
        return redirect()->to(route('visitor.index'))->with(['success' => 'update Visitor successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = visitors::findOrFail($id);
        if($visitor->image) {
            Storage::delete('public/profile/'.$visitor->image);
        }
        if($visitor->delete()) {
            return redirect()->back()->with(['success' => 'deleted successfully']);
        }
    }

    // register new visitor
    public function registerVisitor() {
        #return view('dashboard.auth.register');
    }
}
