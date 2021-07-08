<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'required|email|min:5|unique:users,email',
            'password'=>'required|min:5',
            'full'=>'required',
            'address'=>'required',
            'phone'=>'required|min:9|unique:users,phone'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Không dc để trống email',
            'email.email'=>'email sai định dạng',
            'email.min'=>'email phải >5 kí tự',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'password không dc để trống',
            'password.min'=>'password phải >5 kí tự',
            'full.required'=>'không dc để trống họ tên',
            'address.required'=>'không dc để trống address',
            'phone.required'=>'không dc để trống phone',
            'phone.min'=>'sdt không đúng',
            'phone.unique'=>'sdt đã tồn tại',
        ];
    }
}
