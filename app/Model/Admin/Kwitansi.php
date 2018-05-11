<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    protected $table = 'tbl_kwitansi';
    protected $fillable = ['id_transaksi', 'nomor_kwitansi', 'pelanggan', 'metode_bayar', 'jumlah', 'admin_penginput', 'status', 'updated_at'];
    protected $primaryKey = 'id_kwitansi';
}
