<?php

namespace App\Http\Requests\Admin\Produk;

use Illuminate\Foundation\Http\FormRequest;

class EditProdukRequest extends FormRequest
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
        if ($tipe == 3 || $tipe == 5) {
            return [
                'nama_produk' => 'required|string',
                'harga' => 'required|numeric',
                'desc_prod' => 'required|string',
                'gambar' => 'required_if:tipe,3|image|mimes:png,jpg,jpeg|dimensions:min_height=500',
            ];
        }else{
            return [
                'nama_produk' => 'required|string',
                'desc_prod' => 'required|string',
            ];
        }
    }
}
