<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $permission = $this->route('permission');
        $id         = $permission->id ?? '';

        return [
            'formItem.name'         => 'required|unique:permissions,name,' . $id,
            'formItem.display_name' => 'required|unique:permissions,display_name,' . $id,
            'formItem.http_path'    => 'required',
            'formItem.is_banned'    => 'required|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'formItem.name'         => '名称',
            'formItem.display_name' => '显示名称',
            'formItem.http_path'    => 'HTTP路径',
            'formItem.is_banned'    => '是否禁用',
        ];
    }
}
