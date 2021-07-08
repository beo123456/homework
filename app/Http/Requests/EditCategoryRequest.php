<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'name'=>'required|unique:category,name,'.$this->id_cate.',id', /// không trùng bất cứ tên nào trong cột name của bảng category. teen barng, teen cột, phần muốn bỏ qua, khóa chính
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'không dc để trống tên danh mục',
            'name.unique'=>'tên danh mục đã tồn tại'
        ];
    }
}
