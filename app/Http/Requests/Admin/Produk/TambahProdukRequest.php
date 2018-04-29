<?php

namespace App\Http\Requests\Admin\Produk;

use Illuminate\Foundation\Http\FormRequest;

class TambahProdukRequest extends FormRequest
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
        $tipe = $this->tipe;
        if ($tipe == 1 || $tipe == 2 || $tipe == 3) {
            return [
                'nama_produk' => 'required|string',
                'harga' => 'required|numeric',
                'desc_prod' => 'required|string',
                'gambar' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_height=500',
                'tipe' => 'required|integer',
            ];
        }else{
            return [
                'nama_produk' => 'required|string',
                'desc_prod' => 'required|string',
                'tipe' => 'required|integer',
            ];
        }
    }
}
