<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('student.student-create', compact('courses'));
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        Student::create([
            'name'=> $request->name,
            'age'=> $request->age,
            'phone'=> $request->phone,
            'degree'=>$request->degree,
        ]);
        return Redirect::route('student.index');
    }

    
}
