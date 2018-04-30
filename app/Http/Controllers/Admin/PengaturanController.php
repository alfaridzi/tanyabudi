<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PengaturanController extends Controller
{
    public function edit_bantuan()
    {
    	$bantuan = DB::table('tbl_halaman_bantuan')->first();
    	return view('admin.pengaturan.menu_bantuan', compact('bantuan'));
    }

    public function update_bantuan(Request $request)
    {
    	$bantuan = DB::table('tbl_halaman_bantuan')->where('id_bantuan', '1');
    	$bantuan->update(['konten' => $request->konten]);
    	return redirect()->back()->withSuccess('Berhasil Mengubah Bantuan');
    }
}
