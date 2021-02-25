<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visitor\VisitorUpdate;
use Illuminate\Http\Request;

class EditVisitorController extends Controller
{
    public function editAccountView() {
        return view('site.visitor.edit');
    }

    public function editAccount(VisitorUpdate $request) {
        $fileName = NULL;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'visitor');
        }
        $request['password'] = $request->input('password') ? bcrypt($request->input('password')) : auth('visitor')->user()->password;
        auth('visitor')->user()->update($request->all());
        return redirect()->back()->with(['success' => 'updated information successfully']);
    }
}
