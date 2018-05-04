<?php

namespace App\Http\Requests\Admin\Kloter;

use Illuminate\Foundation\Http\FormRequest;

class TambahKloterRequest extends FormRequest
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
            'nama_kloter' => 'required|string|unique:tbl_kloter,nama_kloter|max:30',
            'kode_flight' => 'nullable|string',
            'tanggal_keberangkatan' => 'nullable|date',
            'maskapai_keberangkatan' => 'nullable|string|max:50',
            'via' => 'nullable|string',
            'tanggal_kepulangan' => 'nullable|date',
            'maskapai_kepulangan' => 'nullable|string|max:50',
            'seat_leader' => 'nullable|string|max:50',
            'total_seat' => 'nullable|numeric',
            'jumlah_hari' => 'nullable|numeric'
        ];
    }
}
