<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|min:6',
            'type' => 'required',
            'position' => 'required|min:6',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên mục không được để trống!',
            'name.min' => 'Tên mục phải có ít nhẩt 6 kí tự!',
            'type.required' => 'Kiểu không được để trống!',
            'position.required' => 'Vị trí không được để trống!',
            'position.min' => 'Vị trí phải có ít nhẩt 6 kí tự!'
        ];
    }
}
