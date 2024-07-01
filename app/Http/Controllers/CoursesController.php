<?php

namespace App\Http\Controllers;

use App\Http\Repository\Course\CourseRepositoryInterface;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{

    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function course()
    {
        $courses = $this->courseRepository->get();
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

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses');
    }
}
