<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Paspor extends Model
{
    protected $table = 'tbl_paspor';
    protected $fillable = ['id_jamaah', 'nomor_paspor', 'nama', 'no_hp_paspor', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'alamat', 'tanggal_issued', 'tanggal_expired', 'keterangan', 'updated_at'];

    protected $primaryKey = 'id_paspor';
}
