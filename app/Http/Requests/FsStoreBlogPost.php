<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FsStoreBlogPost extends FormRequest
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
     * 这是友情链接的验证条件
     * @return array
     */
    public function rules()
    {

        return [
        'fs_name' =>'required',
        'fs_link' =>'required',
        'fs_note' =>'required',

        ];
    }

    public function messages()
    {
        return [
            'fs_name.required' => '请填写链接名字',
            'fs_link.required' => '请填写链接网址',
            'fs_note.required' => '请填写公司名称',
        ];
    }
}
