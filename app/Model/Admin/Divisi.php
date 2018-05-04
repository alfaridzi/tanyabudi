<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'tbl_divisi';
    protected $fillable = ['kode_divisi', 'nama_divisi', 'updated_at'];

    protected $primaryKey = 'kode_divisi';
    public $incrementing = false;
}
