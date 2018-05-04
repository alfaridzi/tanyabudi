<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'tbl_voucher';
    protected $fillable = ['id_agen', 'kode_voucher', 'id_travel', 'nama_travel', 'kategori', 'nama_voucher', 'nominal', 'tanggal_mulai', 'tanggal_akhir', 'status_voucher', 'updated_at'];
    protected $primaryKey = 'id_voucher';
}
