<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mode;
use App\Models\Department;
use App\Models\Level;
use App\Models\Course;
use App\Models\Exam;
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
        $users = User::get();
        return view('admin.admin_dashboard', compact('users'));
    }

    public function mode()
    {
        $modes = Mode::get();

        return view('admin.actions.mode', compact('modes'));
    }

    public function level()
    {
        $levels = Level::get();
        return view('admin.actions.level',compact('levels'));
    }

    public function course()
    {
        $courses = Course::get();
        return view('admin.actions.course',compact('courses'));
    }

    public function department()
    {
        $departments = Department::get();
        return view('admin.actions.department',compact('departments'));
    }

    public function cbt()
    {     
        $exams = Exam::get();
        return view('admin.actions.cbt', compact('exams'));
    }

    public function profiles()
    {
     
        return view('admin.actions.profiles');
    }


}
