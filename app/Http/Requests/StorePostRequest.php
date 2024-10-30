<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|min:6',
            'topic_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Tên bài viết không được để trống!',
            'title.min' => 'Tên bài viết có ít nhất 6 kí tự!',
            'topic_id.required' => 'Chủ đề không được để trống!'
        ];
    }
}
