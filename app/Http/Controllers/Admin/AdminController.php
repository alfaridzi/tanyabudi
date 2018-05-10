<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\EditAdminRequest;
use App\Http\Requests\Admin\Admin\TambahAdminRequest;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Model\Admin\Log;
use App\Model\Admin\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu data admin']);
    }

    public function index()
    {
    	$admin = Admin::with('karyawans')->paginate(15);

    	return view('admin.admin.admin', compact('admin'));
    }

    public function create($id_karyawan)
    {
    	$role = Role::all();
    	return view('admin.admin.tambah_admin', compact('role', 'id_karyawan'));
    }

    public function store(TambahAdminRequest $request, $id_karyawan)
    {
    	$admin = new Admin;
    	$admin->id_karyawan = $id_karyawan;
    	$admin->username = $request->username;
    	$admin->password = bcrypt($request->password);
    	$admin->save();

    	$role = Role::find($request->role)->name;
    	$admin->assignRole($role);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan admin baru dengan username '.$admin->username;
        $log->save();

    	return redirect('index/admin/user')->withSuccess('Berhasil Menambahkan User Baru');
    }

    public function edit($id_admin)
    {
    	$admin = Admin::findOrFail($id_admin);
    	$role = Role::all();
    	return view('admin.admin.edit_admin', compact('admin', 'role'));
    }

    public function update(EditAdminRequest $request, $id_admin)
    {
    	$admin = Admin::findOrFail($id_admin);
    	$role = Role::findOrFail($request->role);
    	$admin->username = $request->username;
    	if (!is_null($request->password)) {
    		$admin->password = bcrypt($request->password);
    	}
    	$admin->syncRoles($role);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data admin dengan username '.$admin->username;
        $log->save();

    	return redirect('index/admin/user')->withSuccess('Berhasil Mengubah User');
    }

    public function delete($id_admin)
    {
    	$admin = Admin::findOrFail($id_admin);
        $username = $admin->username;
        $rincian = Log::where('id_admin', $id_admin)->delete();
    	$admin->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus admin dengan username '.$username;
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Menghapus User');
    }
}
