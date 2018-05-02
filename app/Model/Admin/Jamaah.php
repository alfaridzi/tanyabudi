<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $table = 'tbl_jamaah';
    protected $fillable = ['id_bus', 'id_kamar', 'nomor_transaksi', 'nama_jamaah', 'no_hp_jamaah', 'status_mahrom', 'updated_at'];
    protected $primaryKey = 'id_jamaah';
}
