<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required|string',
            'class' => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'subject.required' => 'Vui lòng chọn môn học.',
            'class.required' => 'Vui lòng chọn lớp học.',
        ];
    }
}
