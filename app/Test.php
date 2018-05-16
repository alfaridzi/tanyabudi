<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tbl_test';
    protected $fillable = ['nama', 'tgl_buat'];
}
