<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:sliders,name,'.$this->post.'',
            'description' => 'required',
            'image_path' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập tên slider.',
            'name.unique' => 'Tên slider bị trùng.',
            'name.max' => 'Vượt quá 255 kí tự',
            'description.required' => 'Nhập mô tả cho slider.',
            'image_path.required' => 'Nhập ảnh cho slider.',
        ];
    }
}
