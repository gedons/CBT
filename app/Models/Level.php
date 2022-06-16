<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mode;
use App\Models\Department;
use App\Models\User;
use App\Models\Exam;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','mode_id'
    ];

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);   
    }
}
