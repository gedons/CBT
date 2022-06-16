<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;
use App\Models\User;
use App\Models\Course;
use App\Models\Exam;

class Department extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','level_id'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all of the courses for the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);   
    }

}
