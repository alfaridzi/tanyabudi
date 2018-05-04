<?php

namespace App\Http\Requests\Admin\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class TambahVoucherRequest extends FormRequest
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

    public function __construct(\Illuminate\Http\Request $request)
    {
        $request->request->add(['kode_voucher' => strtoupper(str_random(11))]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode_voucher' => 'required|unique:tbl_voucher,kode_voucher',
            'kategori' => 'required|integer',
            'nama_voucher' => 'required|string|max:50',
            'nominal' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ];
    }
}
