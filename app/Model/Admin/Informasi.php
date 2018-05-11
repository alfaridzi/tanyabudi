<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'tbl_informasi';
    protected $fillable = ['judul', 'kategori', 'role', 'updated_at'];
    protected $primaryKey = 'id_informasi';
}
