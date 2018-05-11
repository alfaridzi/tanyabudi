<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id_admin = $this->route('id_admin');
        return [
            'username' => 'required|unique:tbl_admin,username,'.$id_admin.',id_admin',
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:roles,id',
        ];
    }
}
