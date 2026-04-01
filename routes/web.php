<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

// Quản lý Sinh viên
Route::resource('students', StudentController::class);

// Quản lý Môn học
Route::resource('courses', CourseController::class);

// Đăng ký môn học
Route::get('students/{student}/enroll', [EnrollmentController::class, 'create'])
    ->name('enroll.create');

Route::post('students/{student}/enroll', [EnrollmentController::class, 'store'])
    ->name('enroll.store');

Route::delete('students/{student}/enroll/{course}', [EnrollmentController::class, 'destroy'])
    ->name('enroll.destroy');
