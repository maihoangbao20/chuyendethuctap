<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|min:6',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống!',
            'name.min' => 'Tên sản phẩm phải có ít nhẩt 6 kí tự!'
        ];
    }
}
