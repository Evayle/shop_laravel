<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsStoreBlogPost extends FormRequest
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
        // /[^a-zA-Z0-9_^\x00-\x80]+/';
        // // $name_yz = '/[^a-zA-Z0-9_u4e00-u9fa5]{3,32}/';
        return [
            'name' => ['required', 'regex:/[^a-zA-Z0-9_u4e00-u9fa5]{3,32}/'],
            'address' => 'required',
            'code' =>['required', 'regex:/^[0-9][0-9]{5}$/'],
            'phone' => 'required', 'phone' => ['required', 'regex:/^1([38]\d|5[0-35-9]|7[3678])\d{8}$/'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名必填',
            'name.regex' => '用户名格式不正确',
            'address.required' => '地址不能为空',
            'code.required' => '邮编不能为空',
            'code.regex' => '邮编格式不正确',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号不正确',
        ];
    }
}
