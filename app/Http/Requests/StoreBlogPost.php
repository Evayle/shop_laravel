<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
        'admin_name' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
        'admin_password' => 'required|regex:/^[\w]{6,18}$/',
        'admin_repassword' => 'required|same:admin_password',
        'admin_email' => 'required',
        'admin_phon' => 'required',
        'admin_itn' => 'required',
        'admin_permission' => 'required',
        'fs_name' =>'required',
        'fs_link' =>'required',
        'fs_note' =>'required',

        ];
    }

    public function messages()
    {
        return [
            'admin_name.required' => '用户名必填',
            'admin_name.regex' => '用户名格式不正确',
            'admin_password.required' => '密码必填',
            'admin_password.regex' => '密码格式不正确',
            'admin_repassword.required' => '确认密码必填',
            'admin_repassword.same' => '两次密码不一致',
            'admin_email.required' => '邮箱必填',
            'admin_phon.required' => '电话必填',
            'admin_itn.required' => '个人介绍必填',
            'admin_permission.required' => '个人权限必填',
            'fs_name.required' => '请填写链接名字',
            'fs_link.required' => '请填写链接网址',
            'fs_note.required' => '请填写公司名称',
        ];
    }
}
