<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'age','phone', 'degree', 'course'
    ];

    protected $guarded = [];
    public function courses()
    {
        return $this->belongsToMany(Course::class,'student_course');
    }
}
