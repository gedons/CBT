<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Question;
use App\Models\Mode;
use App\Models\Level;
use App\Models\Department;

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
        'status',
        'mode_id',
        'level_id',
        'department_id'
    ];



    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
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
