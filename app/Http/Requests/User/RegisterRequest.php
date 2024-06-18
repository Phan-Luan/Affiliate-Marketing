<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'year_of_birth' =>  'required',
            'name' =>  'required',
            'phone' =>  'required|unique:users',
            'password' => 'required|min:6|max:15',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là trường bắt buộc',
            'name.unique' => 'Tên người dùng đã bị trùng',
            'phone.required' => 'Số điện thoại là trường bắt buộc',
            'phone.unique' => 'Số điện thoại đã bị trùng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa 15 ký tự',
        ];
    }

}
