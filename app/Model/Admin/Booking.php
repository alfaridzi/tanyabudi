<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'tbl_booking';
    protected $fillable = ['id_paket', 'id_jamaah', 'id_voucher', 'kode_booking', 'nomor_transaksi', 'status_pemesan', 'updated_at'];
    protected $primaryKey = 'id_booking';
}