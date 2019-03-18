<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidesEditStoreBlogPost extends FormRequest
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
        'slide_note' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'slide_name.required' => '轮播图名称必填',
            'slide_note.required' => '轮播图描述必填',
        ];
    }
}
