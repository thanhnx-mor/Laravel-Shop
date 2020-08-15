<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'content' => 'required|max:1050',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập tên sản phẩm!',
            'name.max'  => 'Tên sản phẩm vượt quá 255 kí tự.',
            'price.required'  => 'Nhập giá sản phẩm!',
            'price.integer'  => 'Giá sản phẩm phải là số.',
            'content.required'  => 'Nhập nội dung sản phẩm.',
            'content.max'  => 'Nội dung sản phẩm vượt quá 255 kí tự.',
            'category_id.required'  => 'Nhập danh mục sản phẩm.',
        ];
    }


}
