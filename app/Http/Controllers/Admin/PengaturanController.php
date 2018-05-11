<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Model\Admin\Admin;

class PengaturanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu edit bantuan']);
    }

    public function edit_bantuan()
    {
    	$bantuan = DB::table('tbl_halaman_bantuan')->first();
    	return view('admin.pengaturan.menu_bantuan', compact('bantuan'));
    }

    public function update_bantuan(Request $request)
    {
    	$bantuan = DB::table('tbl_halaman_bantuan')->where('id_bantuan', '1');
    	$bantuan->update(['konten' => $request->konten]);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah halaman bantuan';
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Mengubah Bantuan');
    }

    public function user()
    {
        return view('admin.pengaturan.user');
    }

    public function user_update(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $this->validate($request, [
            'username' => 'required|string|min:6|unique:tbl_admin,username,'.$user->id_admin.',id_admin|alpha_dash',
            'password' => 'nullable|string|min:6',
            'password_confirmation' => 'confirmed',
        ]);

        $user->username = $request->username;
        if (!is_null($request->password)) {
            $user->password = bcrypt($request->password);

        }
        $user->save();

        return redirect()->back()->withSuccess('Berhasil Mengubah Setting User');
    }
}
