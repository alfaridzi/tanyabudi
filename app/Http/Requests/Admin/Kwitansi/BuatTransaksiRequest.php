<?php

namespace App\Http\Requests\Admin\Kwitansi;

use Illuminate\Foundation\Http\FormRequest;

class BuatTransaksiRequest extends FormRequest
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
            'nama_pelanggan' => 'required|string|max:50',
            'tipe_produk' => 'required|numeric',
            'produk' => 'required_if:tipe_produk,1,2,3,4',
            'user' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'status' => 'required|boolean',
        ];
    }
}
