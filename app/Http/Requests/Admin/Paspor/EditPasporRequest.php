<?php

namespace App\Http\Requests\Admin\Paspor;

use Illuminate\Foundation\Http\FormRequest;

class EditPasporRequest extends FormRequest
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
        $id_paspor = $this->route('id_paspor');
        return [
            'nomor_paspor' => 'required|unique:tbl_paspor,nomor_paspor,'.$id_paspor.',id_paspor',
            'nama' => 'required|string|max:50',
            'jenis_kelamin' => 'required|boolean',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'nomor_hp' => 'required|numeric',
            'provinsi' => 'required|exists:provinces,id',
            'kota' => 'required|exists:regencies,id',
            'kecamatan' => 'required|exists:districts,id',
            'kelurahan' => 'required|exists:villages,id',
            'alamat' => 'required|string',
            'tanggal_issued' => 'required|date',
            'tanggal_expired' => 'required|date',
            'keterangan' => 'nullable',
        ];
    }
}
