<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\User;
use App\payment;

class DashboardController extends Controller
{
    public function index()
    {
    	$transaksi = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_payment.status', '0')
                    ->where(function($q){
                        $q->where('tbl_produk.type', '!=', '5')
                          ->orWhereIn('id_prod', ['3910', '3911']);
                    })->orderBy('tbl_payment.created_at', 'desc')->limit(10)->get();

        $user = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_produk.type', '5')
                    ->where('tbl_payment.status', '0')
                    ->orderBy('tbl_payment.created_at', 'desc')->limit(10)->get();

        $jumlah_transaksi = DB::table('tbl_payment')->select(DB::raw('COUNT(id) as total'), DB::raw('MONTH(created_at) as month'))->whereYear('created_at', '=', date('Y'))->where('status', '1')->groupBy('month')->get();

        $tahun = DB::table('tbl_payment')->select(DB::raw('YEAR(created_at) as tahun'))->groupBy('tahun')->get();

        $array_bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($jumlah_transaksi as $data) {
            $array_bulan[$data->month - 1] = $data->total;
        }

        $chart_transaksi = '['.implode($array_bulan, ',').']' ;

    	return view('admin.dashboard', compact('transaksi', 'user', 'chart_transaksi', 'tahun'));
    }
}
