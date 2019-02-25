<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'formItem.name' => 'required',
            'formItem.tags' => 'required|array',
            'formItem.url'  => 'required',
            'formItem.icon' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'formItem.name' => '名称',
            'formItem.tags' => '标签',
            'formItem.url'  => '地址',
            'formItem.icon' => '图标',
        ];
    }
}
