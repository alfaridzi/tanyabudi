<?php

namespace App\Http\Requests\Admin\Jamaah;

use Illuminate\Foundation\Http\FormRequest;

class EditJamaahRequest extends FormRequest
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
        if (is_null($this->voucher)) {
            return [
                'nomor_transaksi' => 'nullable|string',
                'nomor_paspor' => 'required|string',
                'nama' => 'required|string',
                'jenis_kelamin' => 'required|boolean',
                'nomor_hp' => 'required|numeric',
                'voucher' => 'nullable|exists:tbl_voucher,id_voucher|numeric',
                'status_pemesan' => 'required|boolean',
            ];
        }else{
            $id_booking = \DB::table('tbl_booking')->where('id_voucher', $this->voucher)->first();
            if (is_null($id_booking)) {
                return [
                    'nomor_transaksi' => 'nullable|string',
                    'nomor_paspor' => 'required|string',
                    'nama' => 'required|string',
                    'jenis_kelamin' => 'required|boolean',
                    'nomor_hp' => 'required|numeric',
                    'voucher' => 'nullable|exists:tbl_voucher,id_voucher|numeric|unique:tbl_booking,id_voucher',
                    'status_pemesan' => 'required|boolean',
                ];
            }else{
                return [
                    'nomor_transaksi' => 'nullable|string',
                    'nomor_paspor' => 'required|string',
                    'nama' => 'required|string',
                    'jenis_kelamin' => 'required|boolean',
                    'nomor_hp' => 'required|numeric',
                    'voucher' => 'nullable|exists:tbl_voucher,id_voucher|numeric|unique:tbl_booking,id_voucher,'.$id_booking->id_booking.',id_booking',
                    'status_pemesan' => 'required|boolean',
                ];
            }
        }
    }
}
