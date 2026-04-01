<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\EnrollRequest;

class EnrollmentController extends Controller
{
    public function create(Student $student)
    {
        $courses = Course::whereNotIn('id', $student->courses->pluck('id'))->get();
        return view('enrollments.create', compact('student', 'courses'));
    }

    public function store(EnrollRequest $request, Student $student)
    {
        $student->courses()->attach($request->course_id);

        return redirect()->route('students.show', $student)
            ->with('success', 'Đăng ký môn học thành công!');
    }
}
