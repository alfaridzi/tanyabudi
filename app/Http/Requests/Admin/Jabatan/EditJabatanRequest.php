<?php

namespace App\Http\Requests\Admin\Jabatan;

use Illuminate\Foundation\Http\FormRequest;

class EditJabatanRequest extends FormRequest
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
        $kode_jabatan = $this->route('kode_jabatan');
        return [
            'kode_jabatan' => 'required|unique:tbl_jabatan,kode_jabatan,'.$kode_jabatan.',kode_jabatan',
            'divisi' => 'required|exists:tbl_divisi,kode_divisi',
            'nama_jabatan' => 'required|string',
            'deskripsi' => 'required|string',
            'wilayah' => 'required|string',
        ];
    }
}