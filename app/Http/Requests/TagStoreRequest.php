<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'formItem.name'      => 'required',
            'formItem.color'     => 'required',
            'formItem.is_banned' => 'required|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'formItem.name'      => '名称',
            'formItem.color'     => '颜色',
            'formItem.is_banned' => '禁用'
        ];
    }
}
