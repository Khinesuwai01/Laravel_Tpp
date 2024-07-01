<?php

namespace App\Http\Repository\Course;

interface CourseRepositoryInterface
{
    public function get();

    public function findByID($id);

    
}