<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'tbl_paket';
    protected $fillable = ['id_produk', 'perjalanan', 'kuota', 'sekamar', 'nama_travel', 'gambar_travel', 'keberangkatan', 'tanggal_mulai', 'tanggal_akhir', 'status_paket', 'updated_at'];
    protected $primaryKey = 'id_paket';
}
