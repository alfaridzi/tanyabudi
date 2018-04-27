<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function haji()
    {
    	$haji = DB::table('tbl_payment')->join('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->join('users', 'tbl_payment.id_user', '=', 'users.id')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')->addSelect('users.*', 'users.id as id_users')->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')->where('tbl_produk.type', '1')->paginate(15);
    	return view('admin.transaksi.haji', compact('haji'));
    }
}
