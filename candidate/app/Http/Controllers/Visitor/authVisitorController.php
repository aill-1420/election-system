<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\adminLogin;
use App\Http\Requests\Visitor\VisitorRegister;
use App\Models\visitors;

class authVisitorController extends Controller
{
    // login view
    public function loginView() {
        return view('site.visitor.auth.login');
    }

    // register view
    public function registerView() {
        return view('site.visitor.auth.register');
    }

    // login visitor
    public function login(adminLogin $request) {
        if(auth('visitor')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')])) {
            return redirect()->to(route('visitor.dashboard'));
        }
        return redirect()->back()->with(['error' , 'email or password not correct']);
    }

    // register visitor
    public function register(VisitorRegister $request) {
        $fileName = NULL;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'visitor');
        }
        $visitor = visitors::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number'  => $request->input('phone'),
            'image' => $fileName,
            'created_at' => now()
        ]);
        auth('visitor')->login($visitor);
        return redirect()->to(route('visitor.dashboard'));
    }

    // logout visitor
    public function logout() {
        auth('visitor')->logout();
        return redirect()->to(route('login.visitor.view'));
    }
}
