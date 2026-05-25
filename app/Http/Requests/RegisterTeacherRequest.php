<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable|string|max:191',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:191',
            'Citizen_card' => 'nullable|string|max:191',
            'education_level' => 'nullable|string|max:191',
            'school_id' => 'nullable|integer',
            'exp' => 'nullable|string|max:191',
            'description' => 'nullable|string|max:191',
            'DistrictID' => 'nullable|integer',
            'salary_id' => 'nullable|integer',
            'subjects' => 'nullable|array',
            'subjects.*' => 'integer|exists:subjects,id',
            'class_ids' => 'nullable|array',
            'class_ids.*' => 'integer|exists:class_levels,id',
            'time_tutor_id' => 'nullable|string',
            'Certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'Certificate.mimes' => 'Chứng chỉ phải là file JPG, PNG hoặc PDF.',
            'Certificate.max' => 'Chứng chỉ không được vượt quá 5MB.',
        ];
    }
}
