<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Exam;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course',
        'department_id',
    ];

    /**
     * Get the department that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department ::class);
    }


    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
}
