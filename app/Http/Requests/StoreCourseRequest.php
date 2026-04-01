<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'code'    => 'required|string|max:50|unique:courses,code',
            'credits' => 'required|integer|min:1|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'code.unique' => 'Mã môn học này đã tồn tại.',
            'credits.min' => 'Số tín chỉ phải ít nhất là 1.',
        ];
    }
}
