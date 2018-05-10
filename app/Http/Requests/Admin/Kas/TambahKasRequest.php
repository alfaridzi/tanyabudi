<?php

namespace App\Http\Requests\Admin\Kas;

use Illuminate\Foundation\Http\FormRequest;

class TambahKasRequest extends FormRequest
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
            'nomor_bukti' => 'required',
            'kode_kantor' => 'required|exists:tbl_jabatan,kode_cabang',
            'tanggal_transaksi' => 'required|date',
            'keterangan' => 'nullable|string',
            'tipe' => 'required|boolean',
            'bukti' => 'nullable|image|mimes:png,jpeg,jpg',
        ];
    }
}
