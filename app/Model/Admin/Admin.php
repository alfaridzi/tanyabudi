<?php

namespace App\Model\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $guard_name = 'admin';

    protected $table = 'tbl_admin';
    protected $fillable = ['id_karyawan', 'username', 'password', 'updated_at'];
    
    protected $primaryKey = 'id_admin';

    public function karyawans()
    {
    	return $this->belongsTo('App\Model\Admin\Karyawan', 'id_karyawan', 'id_karyawan');
    }

    public function get_karyawan()
    {
    	return $this->hasOne('App\Model\Admin\Karyawan', 'id_karyawan', 'id_karyawan');
    }

    public function log()
    {
        return $this->hasMany('App\Model\Admin\Log', 'id_admin', 'id_admin');
    }
}
