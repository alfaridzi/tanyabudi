<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $table = 'tbl_jamaah';
    protected $fillable = ['id_user', 'nomor_transaksi', 'status_mahrom', 'updated_at'];
    protected $primaryKey = 'id_jamaah';
}
