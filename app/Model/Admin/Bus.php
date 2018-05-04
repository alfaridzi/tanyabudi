<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'tbl_bus';
    protected $fillable = ['id_kloter', 'kode_bus', 'kode_flight', 'nama_bus', 'seat_bus', 'updated_at'];

    protected $primaryKey = 'id_bus';
}
