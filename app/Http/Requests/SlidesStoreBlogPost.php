<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidesStoreBlogPost extends FormRequest
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
        'slide_name' => 'required',
        'slide_pic' => 'required',
        'slide_note' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'slide_name.required' => '轮播图名称必填',
            'slide_pic.required' => '轮播图片必选',
            'slide_note.required' => '轮播图描述必填',
        ];
    }
}
