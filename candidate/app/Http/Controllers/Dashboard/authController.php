<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\adminLogin;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function loginView() {
        return view('dashboard.admin.auth.login');
    }

    public function login(adminLogin $request) {
        if(auth('admin')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')] , false)) {
            return redirect()->to(route('admin.dashboard'));
        }
        return redirect()->back();
    }

    // logout system
    public function logout() {
        auth('admin')->logout();
        return redirect()->to(route('admin.login.view'));

//        if(auth('admin')->user() == 'admin') {
//            auth('admin')->logout();
//            return redirect()->to(route('admin.login.view'));
//        } elseif(auth('candidate')->user() == 'candidate') {
//            auth('candidate')->logout();
//            return redirect()->to(route('admin.login.view'));
//        }
    }
}
