<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateAdmin;
use Illuminate\Http\Request;

class EditAdminController extends Controller
{
    public function editAccountView() {
        return view('dashboard.admin.edit');
    }

    public function editAccount(UpdateAdmin $request) {
        $fileName = NULL;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->hashName();
            $image->store('/' , 'profile');
        }
        $request['password'] = $request->input('password') ? bcrypt($request->input('password')) : auth('admin')->user()->password;
        auth('admin')->user()->update($request->all());
        return redirect()->back()->with(['success' => 'updated information successfully']);
    }
}
