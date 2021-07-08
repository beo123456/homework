<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
             'code'=>'required|min:3|unique:product,code,'.$this->prd_id.',id',
             'name'=>'required|min:3|unique:product,name,'.$this->prd_id.',id',
             'price'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'code.required'=>'Không được để trống Mã sản phẩm',
            'code.min'=>'Mã Sản phâmr không được nhỏ hơn 3 ký tự',
            'code.unique'=>'Mã sản phẩm đã tồn tại',
            'name.required'=>'Không được để trống Tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'name.min'=>'Tên sản phẩm không được nhỏ hơn 3 ký tự',
            'price.required'=>'Không được để trống Giá sản phẩm',
            'price.numeric'=>'Giá sản phẩm không đúng định dạng',
        ];
    }
}