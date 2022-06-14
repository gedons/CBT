<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Question;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam',
        'exam_date',
        'exam_time',
        'course_id',
        'exam_hours',
        'exam_minutes',
        'started',
    ];



    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get all of the questions for the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
