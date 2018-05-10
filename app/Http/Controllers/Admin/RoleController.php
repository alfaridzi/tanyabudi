<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\Admin\Log;

class RoleController extends Controller
{
	public function __construct()
    {
        $this->middleware(['permission:menu role']);
    }

    public function index()
    {
    	$role = Role::all();

    	$jumlah_permission = Permission::all()->count();

    	return view('admin.role.role', compact('role', 'jumlah_permission'));
    }

    public function create()
    {
    	$permission_action = Permission::where('name', 'not like', 'menu %')->orderBy('name', 'asc')->get();

    	$permission_menu = Permission::where('name', 'like', 'menu %')->get();
    	return view('admin.role.tambah_role', compact('role', 'permission_action', 'permission_menu'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'nama' => 'required|max:20|unique:roles,name',
    	]);

    	$role = Role::create(['guard_name' => 'admin', 'name' => $request->nama]);

    	if (isset($request->super_admin)) {
    		$permission = Permission::all();
    		$role->syncPermissions($permission);
    	}else{
    		$permission = $request['permission'];
    		$role->syncPermissions($permission);
    	}

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan role baru dengan nama '.$request->nama;
        $log->save();

    	return redirect('index/admin/role')->withSuccess('Berhasil Menambahkan Role Baru');
    }

    public function edit($id_role)
    {
    	$role = Role::findOrFail($id_role);
    	$hitungPermission = Permission::all()->count();
    	$super_admin = $role->permissions()->count() == $hitungPermission ? '1' : '0';

    	$permission_action = Permission::where('name', 'not like', 'menu %')->orderBy('name', 'asc')->get();

    	$permission_menu = Permission::where('name', 'like', 'menu %')->get();

    	return view('admin.role.edit_role', compact('role', 'permission_action', 'permission_menu', 'super_admin'));
    }

    public function update(Request $request, $id_role)
    {
    	$role = Role::findOrFail($id_role);
    	$this->validate($request, [
    		'nama' => 'required|max:20|unique:roles,name,'.$id_role,
    	]);

    	if (isset($request->super_admin)) {
    		$permission = Permission::all();
    		$role->syncPermissions($permission);
    	}else{
    		$input = $request->except(['permission']);
    		$permission = $request['permission'];
	    	$role->update(['name' => $input['nama']]);
	    	$dataPermission = Permission::whereIn('id', $permission)->get();
            $role->syncPermissions($dataPermission);
    	}

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah role dengan nama '.$request->nama;
        $log->save();

    	return redirect('index/admin/role')->withSuccess('Berhasil Mengubah Role');
    }

    public function delete($id_role)
    {
    	$role = Role::findOrFail($id_role);
        $nama_role = $role->name;
    	$role->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus role dengan nama '.$nama_role;
        $log->save();

    	return redirect('index/admin/role')->withSuccess('Berhasil Menghapus Role');
    }
}
