<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\User;

class DataUserController extends Controller
{
    public function index_agen()
    {
    	$user = DB::table('users')->where('type', 2)->orderBy('id')->paginate(15);
    	return view('admin.data_user.agen.agen', compact('user'));
    }

    public function search_agen(Request $request)
    {
        $keyword = $request->search;
        $status  = $request->status;

    	$user = DB::table('users')->where('type', 2)->where(function($q) use($status){
    		$q->where('status', $status);
    	})->where(function($q) use($keyword){
    		$q->where('name', 'like', '%'.$keyword.'%')->orWhere('nohp', 'like', '%'.$keyword.'%')->orWhere('email', 'like', '%'.$keyword.'%')->orWhere('name', 'like', '%'.$keyword.'%');
    	})->paginate(15);
    	return view('admin.data_user.agen.agen', compact('user'));
    }

    public function list_trx_agen($id_agen)
    {
        $agen = User::findOrFail($id_agen);
        $user = DB::table('tbl_payment')->addSelect('tbl_payment.*')->addSelect('users.*', 'users.id as id_user')
                        ->addSelect('tbl_produk.*')->addSelect('tbl_paket.*')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                        ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
                        ->where('id_user', $id_agen)->paginate(15);

        return view('admin.data_user.agen.list_transaksi', compact('user', 'agen'));
    }

    public function search_transaksi(Request $request, $id_agen)
    {
        $keyword = $request->search;
        $tanggal_transaksi = $request->tanggal_transaksi;

        $agen = User::findOrFail($id_agen);
        $user = DB::table('tbl_payment')->addSelect('tbl_payment.*')->addSelect('users.*', 'users.id as id_user')
                        ->addSelect('tbl_produk.*')->addSelect('tbl_paket.*')
                        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                        ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                        ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
                        ->where('id_user', $id_agen)->where(function($q) use($tanggal_transaksi){
                            $q->where('tbl_payment.tgl_pembayaran', 'like', '%'.$tanggal_transaksi.'%');
                        })->where(function($q) use($keyword){
                          $q->where('users.name', 'like', '%'.$keyword.'%')->orWhere('tbl_produk.nama', 'like', '%'.$keyword.'%')->orWhere('tbl_produk.harga', 'like', '%'.$keyword.'%')->orWhere('tbl_payment.jumlah_pembayaran', 'like', '%'.$keyword.'%');  
                        })->paginate(15);

        return view('admin.data_user.agen.list_transaksi', compact('user', 'agen'));
    }

    public function index_user()
    {
    	$user = DB::table('users')->where('type', 1)->orderBy('id')->paginate(15);
    	return view('admin.data_user.user.user', compact('user'));
    }

    public function search_user(Request $request)
    {
    	$keyword = $request->search;

    	$user = DB::table('users')->where('type', 1)->where(function($q) use($keyword){
    		$q->where('name', 'like', '%'.$keyword.'%')->orWhere('nohp', 'like', '%'.$keyword.'%')->orWhere('email', 'like', '%'.$keyword.'%')->orWhere('name', 'like', '%'.$keyword.'%');
    	})->paginate(15);
    	return view('admin.data_user.user.user', compact('user'));
    }

    public function konfirmasi($id_user)
    {
    	$user = User::find($id_user);
    	$user->update(['status' => 1]);

    	return redirect()->back()->withSuccess('Berhasil Mengubah Status User');
    }
}
