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
            'formItem.name'      => 'required|unique:permissions,name,' . $id,
            'formItem.slug'      => 'required|unique:permissions,slug,' . $id,
            'formItem.http_path' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'formItem.name'      => '名称',
            'formItem.slug'      => '标签',
            'formItem.http_path' => 'HTTP路径',
        ];
    }
}
