<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'tbl_jabatan';
    protected $fillable = ['kode_jabatan', 'kode_divisi', 'nama_jabatan', 'deskripsi', 'wilayah', 'updated_at'];
    protected $primaryKey = 'kode_jabatan';
    public $incrementing = false;

    public function get_divisi()
    {
    	return $this->belongsTo('App\Model\Admin\Divisi', 'kode_divisi', 'kode_divisi');
    }
}
