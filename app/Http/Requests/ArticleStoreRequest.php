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
        $article = $this->route('article');
        $id      = $article->id ?? '';

        return [
            'formItem.title'     => 'required|string|unique:articles,title,' . $id,
            'formItem.tags'      => 'required|array',
            'formItem.type'      => 'required|string',
            'formItem.is_public' => 'required|boolean',
            'formItem.content'   => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'formItem.title'     => '标题',
            'formItem.tags'      => '标签',
            'formItem.type'      => '类型',
            'formItem.is_public' => '公开',
            'formItem.content'   => '正文',
        ];
    }
}
