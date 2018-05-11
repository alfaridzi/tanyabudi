<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'tbl_saldo';
    protected $fillable = ['id_user', 'saldo', 'updated_at'];
    protected $primaryKey = 'id_saldo';
}
