<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Model\Admin\Log;

class DataUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu data user']);
    }

    public function index_agen()
    {
    	$user = DB::table('users')
                    ->leftJoin('tbl_payment', 'users.id', '=', 'tbl_payment.id_user')
                    ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                    ->leftJoin('tbl_saldo', 'users.id', '=', 'tbl_saldo.id_user')
                    ->where('users.type', 2)->where('tbl_produk.type', '5')->orderBy('users.id')->paginate(15);
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
        $user = DB::table('tbl_payment')->addSelect('tbl_payment.*')
                        ->addSelect('users.*', 'users.id as id_user')
                        ->addSelect('tbl_produk.*')
                        ->addSelect('tbl_paket.*')
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
    	$user = User::findOrFail($id_user);
    	$user->update(['status' => 1]);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengkonfirmasi user dengan nama '.$user->name;
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Mengkonfirmasi User');
    }

    public function ubah_status($id_user)
    {
        $user = User::findOrFail($id_user);
        $status = $user->status;
        if ($status == '0') {
            $user->status = '1';
        }elseif($status == '1') {
            $user->status = '0';
        }
        $user->save();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah status user dengan nama '.$user->name;
        $log->save();

        return redirect()->back()->withSuccess('Berhasil Mengubah Status User');
    }
}
