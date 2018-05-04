<?php

namespace App\Http\Requests\Admin\Bus;

use Illuminate\Foundation\Http\FormRequest;

class TambahBusRequest extends FormRequest
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
            'kloter' => 'required|exists:tbl_kloter,id_kloter',
            'nama_bus' => 'required|string|max:30',
            'kode_bus' => 'required|string|unique:tbl_bus,kode_bus',
            'seat_bus' => 'required|numeric',
        ];
    }
}
