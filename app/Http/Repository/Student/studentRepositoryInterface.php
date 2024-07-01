<?php

namespace App\http\Repository\Student;

interface StudentRepositoryInterface
{
    public function get();

    public function findById($id);
}