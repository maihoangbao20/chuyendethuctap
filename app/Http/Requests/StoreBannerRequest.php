<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required',
            'position' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên banner không được để trống!',
            'position.required' => 'Vị trí không được để trống!',
        ];
    }
}
