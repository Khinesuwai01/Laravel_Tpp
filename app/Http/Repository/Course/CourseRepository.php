<?php

namespace App\Http\Repository\Course;

use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function get()
    {
        return Course::all();
    }

    public function findById($courseId)
    {
        return Course::find($courseId);
    }
}