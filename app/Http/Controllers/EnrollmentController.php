<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\EnrollRequest;

class EnrollmentController extends Controller
{
    public function create(Student $student)
    {
        // Lấy các môn chưa đăng ký
        $enrolledIds = $student->courses->pluck('id');
        $courses = Course::whereNotIn('id', $enrolledIds)->get();

        return view('enrollments.create', compact('student', 'courses'));
    }

    public function store(EnrollRequest $request, Student $student)
    {
        $student->courses()->attach($request->course_id);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Đăng ký môn học thành công!');
    }

    // Hủy đăng ký môn học
    public function destroy(Student $student, Course $course)
    {
        $student->courses()->detach($course->id);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Đã hủy đăng ký môn học thành công!');
    }
}
