<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);

Route::get('students/{student}/enroll', [EnrollmentController::class, 'create'])->name('enroll.create');
Route::post('students/{student}/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');
