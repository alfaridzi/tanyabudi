<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\Admin\Log;

class PermissionController extends Controller
{
	public function __construct()
    {
        $this->middleware(['permission:menu permission']);
    }

    public function index()
    {
    	$permission = Permission::all();
    	return view('admin.permission.permission', compact('permission'));
    }

    public function create()
    {
    	return view('admin.permission.tambah_permission');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|unique:permissions,name'
        ]);

    	$permission = Permission::create(['guard_name' => 'admin', 'name' => $request->nama]);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan permission baru dengan nama '.$request->nama;
        $log->save();

    	return redirect('index/admin/permission')->withSuccess('Berhasil Menambahkan Permission Baru');
    }

    public function delete($id_permission)
    {
    	$permission = Permission::findOrFail($id_permission);
        $nama = $permission->name;
    	$permission->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus permission dengan nama '.$nama;
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Menghapus Permission');
    }
}
