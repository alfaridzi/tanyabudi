<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'tbl_log_admin';
    protected $fillable = ['id_admin', 'isi_log', 'updated_at'];
    protected $primaryKey = 'id_log';
}
