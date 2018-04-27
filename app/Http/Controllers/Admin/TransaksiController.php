<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function haji()
    {
    	$haji = DB::table('tbl_produk')->RightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')->addSelect('users.*', 'users.id as id_users')->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')->where('tbl_produk.type', '1')->orderBy('tbl_payment.id', 'desc')->paginate(15);

    	return view('admin.transaksi.haji', compact('haji'));
    }

    public function konfirm_haji($id)
    {
    	$haji = DB::table('tbl_payment')->where('id', $id)->first();
    	if (is_null($haji)) {
    		abort(404);
    	}
    	DB::table('tbl_payment')->where('id', $id)->update(['status' => '1']);
    	$tabungan = DB::table('tbl_tabungan')->where('id_user', $haji->id_user)->first();
    	$tambah = $haji->jumlah_pembayaran + $tabungan->tabungan;
    	DB::table('tbl_tabungan')->where('id_user', $haji->id_user)->update(['tabungan' => $tambah]);
    	return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi Pembayaran');
    }
}
