<?php

namespace App\Http\Requests\Admin\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class EditVoucherRequest extends FormRequest
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
        $id = $this->route('id_voucher');
        return [
            'kategori' => 'required|integer',
            'nama_voucher' => 'required|string|max:50',
            'nominal' => 'required|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ];
    }
}
