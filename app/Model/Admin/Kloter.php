<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Kloter extends Model
{
    protected $table = 'tbl_kloter';
    protected $fillable = ['kode_flight', 'tanggal_keberangkatan', 'maskapai_keberangkatan', 'via', 'tanggal_kepulangan', 'maskapai_kepulangan', 'seat_leader', 'total_seat', 'jumlah_hari', 'updated_at'];

    protected $primaryKey = 'id_kloter';
}
