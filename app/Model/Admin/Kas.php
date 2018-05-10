<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'tbl_kas';
    protected $fillable = ['nomor_bukti', 'kode_kantor', 'tanggal_transaksi', 'keterangan', 'tipe', 'bukti', 'admin_penginput', 'admin_update', 'updated_at'];
    protected $primaryKey = 'id_kas';
}
