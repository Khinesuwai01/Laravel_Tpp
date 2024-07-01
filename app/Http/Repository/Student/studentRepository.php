<?php

namespace App\http\Repository\Student;

use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function get()
    {
        return Student::all();
    }

    public function findById($studentId)
    {
        return Student::find($studentId);
    }
}