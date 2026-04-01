<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $student = $this->route('student');
            $course = \App\Models\Course::find($this->course_id);

            if (!$course) return;

            // Kiểm tra đăng ký trùng
            if ($student->courses->contains($course)) {
                $validator->errors()->add('course_id', 'Sinh viên đã đăng ký môn học này rồi.');
                return;
            }

            // Kiểm tra giới hạn 18 tín chỉ
            $currentCredits = $student->total_credits;
            $newTotal = $currentCredits + $course->credits;

            if ($newTotal > 18) {
                $validator->errors()->add(
                    'course_id',
                    "Vượt quá giới hạn 18 tín chỉ. Hiện tại: {$currentCredits} | Sau khi đăng ký: {$newTotal}"
                );
            }
        });
    }
}
