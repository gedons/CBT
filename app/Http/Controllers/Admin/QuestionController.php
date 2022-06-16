<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;

class QuestionController extends Controller
{
    public function add()
    {
        $exams = Exam::get();
        return view('admin.question.add', compact('exams'));
    }

    public function save(Request $request)
    {
        Question::create([
            'exam_id' => $request->exam_id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer
        ]);

         return Redirect(route('admin.cbt'))->with('message', 'Question Created Successfully!!');
    }
}
