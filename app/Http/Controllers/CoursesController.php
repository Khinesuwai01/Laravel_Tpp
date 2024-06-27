<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{
    public function course()
    {
        $courses = Course::all();
        return view('student.course', compact(('courses')));
    }

    public function create()
    {
        return view('student.course-create');
    }
    
    public function store(Request $request)
    {
        Course::create([
            'name'=> $request->name,
        ]);
        return Redirect::route('allCourses');
    }
}
