<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
}
