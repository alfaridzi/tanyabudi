<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ppob extends Model
{
    protected $table = 'tbl_pulsa';
    public $incrementing = false; 
    protected $fillable = ['id_pulsa','id_user','jumlah_pembayaran','tgl_pembayaran'];
}
