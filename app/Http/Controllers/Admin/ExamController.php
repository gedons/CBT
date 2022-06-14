<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Exam;

class ExamController extends Controller
{
    public function add()
    {
        $courses = Course::all();
        return view('admin.cbt.add', compact('courses'));
    }

    public function save(Request $request)
    {
        Exam::create([
            'exam' => $request->exam,
            'exam_date' => $request->exam_date,
            'exam_time' => $request->exam_time,
            'course_id' => $request->course_id,
            'exam_hours' => $request->exam_hours,
            'exam_minutes' => $request->exam_minutes,
            // 'started' => '0',
            
        ]);

         return Redirect(route('admin.cbt'))->with('message', 'CBT Created Successfully!!');
    }
}
