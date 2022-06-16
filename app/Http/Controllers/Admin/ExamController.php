<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Mode;
use App\Models\Level;
use App\Models\Department;

class ExamController extends Controller
{
    public function add()
    {
        $courses = Course::all();
        $modes = Mode::all();
        $levels = Level::all();
        $departments = Department::all();
        return view('admin.cbt.add', compact('courses','modes','levels','departments'));
    }

    public function save(Request $request)
    {
        Exam::create([
            'exam' => $request->exam,
            'exam_date' => $request->exam_date,
            'exam_time' => $request->exam_time,
            'course_id' => $request->course_id,
            'mode_id' => $request->mode_id,
            'level_id' => $request->level_id,
            'department_id' => $request->department_id,
            'exam_hours' => $request->exam_hours,
            'exam_minutes' => $request->exam_minutes,
            // 'started' => '0',
            
        ]);

         return Redirect(route('admin.cbt'))->with('message', 'CBT Created Successfully!!');
    }
}
