<?php

namespace App\Http\Requests\Admin\Kamar;

use Illuminate\Foundation\Http\FormRequest;

class EditKamarRequest extends FormRequest
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
        $id_kamar = $this->route('id_kamar');
        return [
            'kode_kamar' => 'required|unique:tbl_kamar,kode_kamar,'.$id_kamar.',id_kamar|max:20',
            'kloter' => 'required|exists:tbl_kloter,id_kloter',
            'tipe_kamar' => 'required|string|max:30',
            'kuota' => 'required|numeric'
        ];
    }
}
