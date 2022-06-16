<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Level;
use App\Models\Exam;

class Mode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);   
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);   
    }
}
