<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\tabungan;
use App\payment;

class TransaksiController extends Controller
{
    public function haji()
    {
    	$haji = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')->addSelect('users.*', 'users.id as id_users')->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')->where('tbl_produk.type', '1')->orderBy('tbl_payment.id', 'desc')->paginate(15);

    	return view('admin.transaksi.haji', compact('haji'));
    }

    public function umroh()
    {
        $umroh = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')->addSelect('users.*', 'users.id as id_users')->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')->where('tbl_produk.type', '2')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.umroh', compact('umroh'));
    }

    public function wisata()
    {
        $wisata = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')->addSelect('users.*', 'users.id as id_users')->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')->where('tbl_produk.type', '3')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.wisata', compact('wisata'));
    }

    public function sedekah()
    {
        $sedekah = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')->addSelect('users.*', 'users.id as id_users')->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')->where('tbl_produk.type', '4')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.sedekah', compact('sedekah'));
    }

    public function bayar_paket()
    {
        $paket = DB::table('tbl_produk')->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')->LeftJoin('users', 'tbl_payment.id_user', '=', 'users.id')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')->addSelect('users.*', 'users.id as id_users')->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')->where('tbl_payment.id_prod', '3910')->orderBy('tbl_payment.id', 'desc')->paginate(15);

        return view('admin.transaksi.bayar_paket', compact('paket'));
    }

    public function konfirm($id)
    {
    	$payment = DB::table('tbl_payment')->where('id', $id)->first();
    	if (is_null($payment)) {
    		abort(404);
    	}
    	DB::table('tbl_payment')->where('id', $id)->update(['status' => '1']);

    	return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi Pembayaran');
    }

    public function konfirm_paket($id)
    {
        $payment = DB::table('tbl_payment')->where('id', $id)->where('id_prod', '3910')->first();
        if (is_null($payment)) {
            abort(404);
        }

        $tabungan = DB::table('tbl_tabungan')->where('id_user', $payment->id_user)->first();
        $tambah_tabungan = $payment->jumlah_pembayaran + $tabungan->tabungan;

        payment::find($id)->update(['status' => '1']);
        tabungan::find($tabungan->id)->update(['tabungan' => $tambah_tabungan]);

        return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi Pembayaran');
    }
}
