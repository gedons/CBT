<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.admin_login');
    }

    public function loginAdmin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
            return Redirect('admin/dashboard')->with('message', 'Logged In Successfully...');
        }
        else{
            return Redirect()->back()->with('error', 'Invalid Login Details');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return Redirect('/admin')->with('message', 'Logged Out Successfully... ');;
    }

    public function dashboard()
    {
        $user = User::get();
        return view('admin.admin_dashboard', compact('user'));
    }
}
