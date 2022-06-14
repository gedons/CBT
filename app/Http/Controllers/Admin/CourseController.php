<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;

class CourseController extends Controller
{
    public function add()
    {
        $departments = Department::all();
        return view('admin.course.add', compact('departments'));
    }

    public function save(Request $request)
    {
        Course::create([
            'course' => $request->course,
            'department_id' => $request->department_id
        ]);

         return Redirect(route('admin.course'))->with('message', 'Course Created Successfully!!');
    }
}
