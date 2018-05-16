<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function dashboard_notif($tipe)
    {
        if ($tipe == 'haji') {
            $tipe = 1;
        }elseif($tipe == 'umroh') {
            $tipe = 2;
        }elseif($tipe == 'wisata') {
            $tipe = 3;
        }elseif($tipe == 'sedekah') {
            $tipe = 4;
        }elseif($tipe == 'user') {
            $tipe = 5;
        }elseif($tipe == 'tabungan') {
            $tipe = 3910;
        }elseif($tipe == 'top-up') {
            $tipe = 3911;
        }

        if ($tipe == 'transaksi') {
            $notif = DB::table('tbl_payment')->where('status', '0')->count();
        }elseif($tipe == '3911' || $tipe == '3910') {
            $notif = DB::table('tbl_payment')->where('status', '0')->where('id_prod', $tipe)->count();
        }else{
            $notif = DB::table('tbl_payment')->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->where('status', '0')->where('type', $tipe)->count();
        }

        if ($notif > 99) {
            $notif = '99+';
        }

        return $notif;
    }

    public function dashboard_chart(Request $request)
    {
        $tahun = $request->tahun;
        if ($request->status == '3') {
            $status = null;
        }else{
            $status = $request->status;
        }

        $jumlah_transaksi = DB::table('tbl_payment')->select(DB::raw('COUNT(id) as total'), DB::raw('MONTH(created_at) as month'))->where('status', $status)->whereYear('created_at', '=', $tahun)->groupBy('month')->get();

        $array_bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($jumlah_transaksi as $data) {
            $array_bulan[$data->month - 1] = $data->total;
        }

        $chart_transaksi = '['.implode($array_bulan, ',').']' ;

        return response()->json($chart_transaksi);
    }

    public function dashboard_transaksi(Request $request)
    {
        $pembanding = DB::table('tbl_payment')
                        ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                        ->where('status', '0')
                        ->where(function($q){
                            $q->where('tbl_produk.type', '!=', '5')
                              ->orWhereIn('id_prod', ['3910', '3911']);
                        })->count();

        $jumlah = $request->jumlah;

        if ($pembanding != $jumlah) {
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
                            })->orderBy('tbl_payment.created_at', 'desc')->limit(1)->first();

            $data = view('admin.ajax.row_transaksi',compact('transaksi'))->render();
            return response()->json($data);
        }else{
            return response()->json(['msg' => 'Tidak ada data baru'], 400);
        }
    }

    public function dashboard_user(Request $request)
    {
        $jumlah = $request->jumlah;

        $pembanding = DB::table('tbl_payment')->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')->where('status', '0')->where('type', '5')->count();

        if ($pembanding != $jumlah) {
            $user = DB::table('tbl_produk')->addSelect('tbl_payment.*', 'tbl_payment.id as id_payment')
                    ->addSelect('tbl_produk.*', 'tbl_produk.id as id_produk')
                    ->addSelect('users.*', 'users.id as id_users')
                    ->addSelect('tbl_payment.status', 'tbl_payment.status as status_pembayaran')
                    ->rightJoin('tbl_payment', 'tbl_produk.id', '=', 'tbl_payment.id_prod')
                    ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
                    ->where('tbl_produk.type', '5')
                    ->where('tbl_payment.status', '0')
                    ->orderBy('tbl_payment.created_at', 'desc')->limit(1)->first();

            $data = view('admin.ajax.row_user',compact('user'))->render();
            return response()->json($data);
        }else{
            return response()->json(['msg' => 'Tidak ada data baru'], 400);
        }
    }

    public function get_jabatan($kode_divisi)
    {
    	$jabatan = DB::table('tbl_jabatan')->where('kode_divisi', $kode_divisi)->pluck('kode_jabatan', 'nama_jabatan')->all();
    	$data = view('admin.ajax.select_jabatan',compact('jabatan'))->render();
    	return response()->json(['options' => $data]);
    }

    public function get_kota($province_id)
    {
    	$kota = DB::table('regencies')->where('province_id', $province_id)->pluck('id', 'name')->all();
    	$data = view('admin.ajax.select_kota',compact('kota'))->render();
    	return response()->json(['options' => $data]);
    }

    public function get_kecamatan($regency_id)
    {
    	$kecamatan = DB::table('districts')->where('regency_id', $regency_id)->pluck('id', 'name')->all();
    	$data = view('admin.ajax.select_kecamatan',compact('kecamatan'))->render();
    	return response()->json(['options' => $data]);
    }

	public function get_kelurahan($district_id)
    {
    	$kelurahan = DB::table('villages')->where('district_id', $district_id)->pluck('id', 'name')->all();
    	$data = view('admin.ajax.select_kelurahan',compact('kelurahan'))->render();
    	return response()->json(['options' => $data]);
    }

    public function get_produk($tipe_produk)
    {
        $produk = DB::table('tbl_produk')->where('type', $tipe_produk)->get();
        $data = view('admin.ajax.select_produk',compact('produk'))->render();
        return response()->json(['options' => $data]);
    }

    public function get_user($tipe_produk)
    {
        if($tipe_produk == 1 || $tipe_produk == 2){
            $user = DB::table('users')->addSelect('users.*', 'users.id as user_id')->addSelect('tbl_tabungan.*', 'tbl_tabungan.id as id_tabungan')->leftJoin('tbl_tabungan', 'users.id', '=', 'tbl_tabungan.id_user')->whereNull('tbl_tabungan.tabungan')->get();
        }elseif ($tipe_produk == 3 || $tipe_produk == 4) {
            $user = DB::table('users')->addSelect('users.*', 'users.id as user_id')->get();
        }elseif ($tipe_produk == 5){
            $user = DB::table('users')->selectRaw('users.*, users.id as user_id, tbl_tabungan.*, tbl_tabungan.id as id_tabungan')->rightJoin('tbl_tabungan', 'users.id', '=', 'tbl_tabungan.id_user')->get();
        }
        $data = view('admin.ajax.select_user', compact('user'))->render();
        return response()->json(['options' => $data]);
    }

    public function get_sisa_tagihan($id_user)
    {
        $tabungan = DB::table('tbl_tabungan')->where('id_user', $id_user)->first();
        $produk = DB::table('tbl_payment')
                    ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                    ->where('tbl_payment.id_user', $id_user)->whereIn('type', ['1', '2'])
                    ->get()->last();

        $sisa_tagihan = 'Rp '.number_format($produk->harga - $tabungan->tabungan, 2, ',', '.');

        return response()->json($sisa_tagihan);
    }

    public function detail_karyawan($id_karyawan)
    {
    	$karyawan = DB::table('tbl_karyawan')->addSelect('tbl_karyawan.*')
        ->addSelect('tbl_divisi.*')
        ->addSelect('tbl_jabatan.*')
        ->addSelect('provinces.name as nama_provinsi')
        ->addSelect('regencies.name as nama_kota')
        ->addSelect('districts.name as nama_kecamatan')
        ->addSelect('villages.name as nama_kelurahan')
        ->join('tbl_divisi', 'tbl_karyawan.kode_divisi', '=', 'tbl_divisi.kode_divisi')
        ->join('tbl_jabatan', 'tbl_karyawan.kode_jabatan', '=', 'tbl_jabatan.kode_jabatan')
        ->join('provinces', 'tbl_karyawan.provinsi', '=', 'provinces.id')
        ->join('regencies', 'tbl_karyawan.kota', '=', 'regencies.id')
        ->join('districts', 'tbl_karyawan.kecamatan', '=', 'districts.id')
        ->join('villages', 'tbl_karyawan.kelurahan', '=', 'villages.id')->first();
    	return response()->json(['options' => $karyawan]);
    }

    public function get_transaksi($keyword) {
        $transaksi = DB::table('tbl_payment')
        ->selectRaw('tbl_produk.id as id_produk, tbl_produk.type, tbl_produk.nama, tbl_payment.id as id_payment, users.name, users.email')
        ->leftJoin('users', 'tbl_payment.id_user', '=', 'users.id')
        ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
        ->where('tbl_payment.status', '4')
        ->whereIn('tbl_produk.type', ['1', '2'])
        ->where('tbl_payment.id', 'like', '%'.$keyword.'%')
        ->orderBy('tbl_payment.created_at', 'desc')->get();

        return response()->json($transaksi);
    }
}
