<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'tbl_produk';
    protected $fillable = ['nama','harga','desc_prod','type'];
}
