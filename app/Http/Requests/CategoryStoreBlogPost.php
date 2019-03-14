<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreBlogPost extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
        'categorys_name' => 'required',
        'categorys_pid' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'categorys_name.required' => '分类名称必填',
            'categorys_pid.required' => '所属分类必填',
        ];
    }
}
