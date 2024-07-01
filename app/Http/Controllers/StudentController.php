<?php

namespace App\Http\Controllers;

use App\http\Repository\Student\StudentRepositoryInterface;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{

    private StudentRepositoryInterface $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->get();
        return view('student.index',compact('students'));
    }

    public function create()
    {
        $students = Course::all();
        return view('student.student-create', compact('students'));
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $students = Student::create([
            'name'=> $request->name,
            'age'=> $request->age,
            'phone'=> $request->phone,
            'degree'=>$request->degree,
        ]);

        if ($request->courses) {
            $syncData = [];
            foreach ($request->courses as $courseId) {
                $syncData[$courseId] = ['extra_field' => $request->extra_field[$courseId] ?? null];
            }
            $students->courses()->sync($syncData);
        }

        return Redirect::route('student.index');
    }

    public function edit(Student $student)
    {
        $student = $this->studentRepository->findById(($student));
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone' => 'required',
            'degree' => 'required',
            'courses' => 'array',
        ]);

        $student->update($request->all());

        if ($request->courses) {
            $syncData = [];
            foreach ($request->courses as $courseId) {
                $syncData[$courseId] = ['extra_field' => $request->extra_field[$courseId] ?? null];
            }
            $student->courses()->sync($syncData);
        }

        return redirect()->route('students');
    }

    public function destroy(Student $student)
    {
        $students = $this->studentRepository->findById(($student));
        $students->delete();
        return redirect()->route('students');
    }

    
}
