<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'required|max:255|unique:settings,config_key,'.$this->post.'',
            'config_value' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'config_key.required' => 'Nhập tên config key.',
            'config_key.unique' => 'Tên config key bị trùng.',
            'config_key.max' => 'Vượt quá 255 kí tự',
            'config_value.required' => 'Nhập mô tả cho setting.',
        ];
    }
}
