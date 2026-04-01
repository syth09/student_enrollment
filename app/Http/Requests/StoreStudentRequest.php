<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'major' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Email này đã tồn tại.',
        ];
    }
}
