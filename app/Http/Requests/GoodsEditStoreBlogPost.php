<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsEditStoreBlogPost extends FormRequest
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
        'goods_name' => 'required',
        'goods_describe' => 'required',
        'goods_keywords' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'goods_name.required' => '商品名称必填',
            'goods_describe.required' => '商品描述必填',
            'goods_keywords.required' => '商品关键词必填',
        ];
    }
}
