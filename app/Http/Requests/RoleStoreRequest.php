<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'formItem.name'              => 'required',
            'formItem.slug'              => 'required',
            'formItem.targetPermissions' => 'required|array',
        ];
    }

    public function attributes()
    {
        return [
            'formItem.name'      => '名称',
            'formItem.slug'      => '标签',
        ];
    }
}
