<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'tbl_karyawan';
    protected $fillable = ['kode_divisi', 'kode_jabatan', 'nik', 'nama', 'kode_pos', 'tanggal_bergabung', 'status', 'tempat_lahir', 'tanggal_lahir', 'no_telp_rumah', 'jenis_kelamin', 'alamat', 'email', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'no_hp', 'updated_at'];

    protected $primaryKey = 'id_karyawan';

    public function get_divisi()
    {
    	return $this->belongsTo('App\Model\Admin\Divisi', 'kode_divisi', 'kode_divisi');
    }

    public function get_jabatan()
    {
    	return $this->belongsTo('App\Model\Admin\Jabatan', 'kode_jabatan', 'kode_jabatan');
    }
}
