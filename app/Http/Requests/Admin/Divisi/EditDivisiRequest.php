<?php

namespace App\Http\Requests\Admin\Divisi;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Admin\Divisi;

class EditDivisiRequest extends FormRequest
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
        $kode_divisi = $this->route('kode_divisi');
        return [
            'kode_divisi' => 'required|alpha_dash|unique:tbl_divisi,kode_divisi,'.$kode_divisi.',kode_divisi',
            'nama_divisi' => 'required|string',
        ];
    }
}
