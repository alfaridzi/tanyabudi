<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = 'tbl_payment';

    protected $fillable = ['id_user','id_prod','jumlah_pembayaran','tgl_pembayaran','foto','status','id','counter'];

    protected $primaryKey = 'id';

    public $incrementing = false;
    public function produk() {
    	return $this->hasOne('App\produk','id','id_prod');
    }

    public function users() {
    	return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
