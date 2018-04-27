<?php

namespace App\Http\Requests\Admin\Karyawan;

use Illuminate\Foundation\Http\FormRequest;

class TambahKaryawanRequest extends FormRequest
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
        return [
            'divisi' => 'required|exists:tbl_divisi,kode_divisi',
            'jabatan' => 'required|exists:tbl_jabatan,kode_jabatan',
            'nik' => 'required|string|unique:tbl_karyawan,nik',
            'nama' => 'required|string|max:30',
            'tanggal_bergabung' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|boolean',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'no_telp_rumah' => 'required|numeric',
            'email' => 'required|email|unique:tbl_karyawan,email',
            'provinsi' => 'required|exists:provinces,id',
            'kota' => 'required|exists:regencies,id',
            'kecamatan' => 'required|exists:districts,id',
            'kelurahan' => 'required|exists:villages,id',
            'alamat' => 'required|string',
            'status' => 'required|boolean',
            'kode_pos' => 'required|numeric',
        ];
    }
}
