<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'tbl_kamar';
    protected $fillable = ['kode_kamar', 'tipe_kamar', 'kuota', 'updated_at'];
    protected $primaryKey = 'id_kamar';
}
