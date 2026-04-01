<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EnrollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $student = $this->route('student');

        return [
            'courrse_id' => [
                'required',
                'exists:courses,id',
                'unique:enrollments,course_id,NULL,id,student_id,' . $student->id,
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'Mã môn học là bắt buộc.',
            'course_id.exists' => 'Môn học không tồn tại.',
            'course_id.unique' => 'Sinh viên đã đăng ký môn học này rồi.',
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $student = $this->route('student');
            $course = \App\Models\Course::find($this->course_id);

            if ($course) {
                $newTotal = $student->total_credits + $course->credits;

                if ($newTotal > 18) {
                    $validator->errors()->add(
                        'course_id',
                        "Vượt quá giới hạn 18 tín chỉ. Hiện tại: {$student->total_credits} tín chỉ."
                    );
                }
            }
        });
    }
}
