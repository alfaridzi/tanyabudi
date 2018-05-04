<?php

namespace App\Http\Requests\Admin\Kloter;

use Illuminate\Foundation\Http\FormRequest;

class EditKloterRequest extends FormRequest
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
        $id_kloter = $this->route('id_kloter');
        return [
            'nama_kloter' => 'required|string|max:30|unique:tbl_kloter,nama_kloter,'.$id_kloter.',id_kloter',
            'kode_flight' => 'nullable',
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
