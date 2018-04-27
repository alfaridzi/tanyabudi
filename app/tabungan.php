<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabungan extends Model
{
    protected $table = 'tbl_tabungan';
    protected $fillable = ['id_user','tabungan'];
}
