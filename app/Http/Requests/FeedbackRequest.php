<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'point' => 'required|integer|min:1|max:5',
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'point.required' => 'Vui lòng chọn điểm đánh giá.',
            'point.min' => 'Điểm đánh giá tối thiểu là 1.',
            'point.max' => 'Điểm đánh giá tối đa là 5.',
            'description.required' => 'Vui lòng nhập nội dung đánh giá.',
        ];
    }
}
