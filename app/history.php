<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table = 'tbl_history';
    protected $fillable = ['id_user','title','info','jam','tanggal'];
}
