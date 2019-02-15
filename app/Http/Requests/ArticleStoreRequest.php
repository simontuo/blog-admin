<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'formItem.title'    => 'required|string',
            'formItem.tags'     => 'required|array',
            'formItem.type'     => 'required|string',
            'formItem.isPublic' => 'required|boolean',
            'formItem.content'  => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'formItem.title'    => '标题',
            'formItem.tags'     => '标签',
            'formItem.type'     => '类型',
            'formItem.isPublic' => '公开',
            'formItem.content'  => '正文',
        ];
    }
}
