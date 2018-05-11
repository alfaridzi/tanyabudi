<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pulsa extends Model
{
    protected $tbl = tbl_pulsa;
    public $incrementing = false; 
    protected $fillable = ['id_pulsa','id_user','jumlah_pembayaran','tgl_pembayaran'];
}
