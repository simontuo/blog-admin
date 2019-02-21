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
            'formItem.display_name'      => 'required',
            'formItem.is_banned'         => 'required|boolean',
            'formItem.targetPermissions' => 'required|array',
        ];
    }

    public function attributes()
    {
        return [
            'formItem.name'         => '名称',
            'formItem.display_name' => '显示名称',
            'formItem.is_banned'    => '禁用',
        ];
    }
}
