<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Jamaah\TambahJamaahRequest;
use App\Http\Requests\Admin\Jamaah\EditJamaahRequest;

use App\payment;
use App\Model\Admin\Jamaah;
use App\Model\Admin\Booking;
use App\Model\Admin\Paspor;
use App\Model\Voucher;
use App\Model\Admin\Log;

class JamaahController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu jamaah']);
    }

    public function index()
    {
    	$jamaah = DB::table('tbl_jamaah')->addSelect('tbl_jamaah.*')
        ->addSelect('tbl_paspor.*')->addSelect('tbl_booking.*')->addSelect('tbl_kamar.*')
        ->addSelect('tbl_bus.*')->addSelect('tbl_produk.*')->addSelect('tbl_paket.*')
        ->leftJoin('users', 'tbl_jamaah.id_user', '=', 'users.id')
        ->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')
        ->leftJoin('tbl_booking', 'tbl_jamaah.id_jamaah', '=', 'tbl_booking.id_jamaah')
        ->leftJoin('tbl_payment', 'tbl_booking.id_transaksi', '=', 'tbl_payment.id')
        ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
        ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
        ->leftJoin('tbl_kuota_bus', 'tbl_jamaah.id_jamaah', '=', 'tbl_kuota_bus.id_jamaah')
        ->leftJoin('tbl_bus', 'tbl_kuota_bus.id_bus', '=', 'tbl_bus.id_bus')
        ->leftJoin('tbl_kuota_kamar', 'tbl_jamaah.id_jamaah', '=', 'tbl_kuota_kamar.id_jamaah')
        ->leftJoin('tbl_kamar', 'tbl_kuota_kamar.id_kamar', '=', 'tbl_kamar.id_kamar')->paginate(15);

    	return view('admin.data_booking.jamaah.jamaah', compact('jamaah'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $status_mahrom = $request->status_mahrom;

        $jamaah = DB::table('tbl_jamaah')
        ->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')
        ->leftJoin('tbl_booking', 'tbl_jamaah.id_jamaah', '=', 'tbl_booking.id_jamaah')
        ->where(function($q) use($status_mahrom){
            $q->where('status_mahrom', $status_mahrom);
        })->where(function($q) use($keyword){
            $q->where('kode_booking', 'like', '%'.$keyword.'%')->orWhere('id_transaksi', 'like', '%'.$keyword.'%')->orWhere('nomor_paspor', 'like', '%'.$keyword.'%')->orWhere('nama_jamaah', 'like', '%'.$keyword.'%');
        })->paginate(15);

        return view('admin.data_booking.jamaah.jamaah', compact('jamaah'));
    }

    public function create()
    {
    	$voucher = DB::table('tbl_voucher')
                    ->addSelect('tbl_booking.*', 'tbl_booking.id_voucher as id_voucher_booking')
                    ->addSelect('tbl_voucher.*')
                    ->leftJoin('tbl_booking', 'tbl_voucher.id_voucher', '=', 'tbl_booking.id_voucher')
                    ->where('tbl_booking.id_voucher', null)
                    ->where('tanggal_akhir', '>', date('Y-m-d H:i:s'))->where('status_voucher', '0')->get();

    	return view('admin.data_booking.jamaah.tambah_jamaah', compact('voucher'));
    }

    public function store(TambahJamaahRequest $request)
    {
    	do {
    		$kode_booking = 'BOO'.strtoupper(str_random(11));
    		$cek = DB::table('tbl_booking')->where('kode_booking', $kode_booking)->first();
    	} while (!is_null($cek));

        $transaksi = payment::findOrFail($request->nomor_transaksi);

        DB::beginTransaction();

        try {
        	$jamaah = new Jamaah;
            $jamaah->id_user = $transaksi->id_user;
        	$jamaah->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        try {
        	$id_jamaah = $jamaah->id_jamaah;

        	$booking = new Booking;
        	$booking->id_jamaah = $id_jamaah;
        	$booking->id_voucher = $request->voucher;
        	$booking->id_transaksi = $request->nomor_transaksi;
            $booking->nama_pemesan = $request->nama_pemesan;
        	$booking->kode_booking = $kode_booking;
        	$booking->status_pemesan = $request->status_pemesan;
        	$booking->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        try {
        	$paspor = new Paspor;
        	$paspor->id_jamaah = $id_jamaah;
        	$paspor->nomor_paspor = $request->nomor_paspor;
        	$paspor->nama_paspor = $request->nama;
        	$paspor->jenis_kelamin = $request->jenis_kelamin;
        	$paspor->no_hp_paspor = $request->nomor_hp;
        	$paspor->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        try {
            $log = new Log;
            $log->id_admin = \Auth::guard('admin')->user()->id_admin;
            $log->isi_log = 'Menambahkan jamaah baru dengan nama jamaah '.$paspor->nama_paspor;
            $log->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        DB::commit();
    	return redirect('index/admin/data-booking/jamaah')->withSuccess('Berhasil Menambahkan Jamaah Baru, Sekarang Silahkan Lengkapi Paspor Jamaah');
    }

    public function edit($id_jamaah)
    {
    	$jamaah = DB::table('tbl_jamaah')->where('tbl_jamaah.id_jamaah', $id_jamaah)
                    ->addSelect('tbl_jamaah.*')
                    ->addSelect('tbl_paspor.*')
                    ->addSelect('tbl_booking.*')
                    ->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')
                    ->leftJoin('tbl_booking', 'tbl_jamaah.id_jamaah', '=', 'tbl_booking.id_jamaah')->first();

    	$voucher = DB::table('tbl_voucher')
                    ->addSelect('tbl_booking.*', 'tbl_booking.id_voucher as id_voucher_booking')
                    ->addSelect('tbl_voucher.*')
                    ->leftJoin('tbl_booking', 'tbl_voucher.id_voucher', '=', 'tbl_booking.id_voucher')
                    ->where('tbl_booking.id_jamaah', $id_jamaah)
                    ->orWhere('tbl_booking.id_voucher', null)
                    ->where('tanggal_akhir', '>', date('Y-m-d H:i:s'))->where('status_voucher', '0')->get();

    	return view('admin.data_booking.jamaah.edit_jamaah', compact('jamaah', 'voucher'));
    }

    public function update(EditJamaahRequest $request, $id_jamaah)
    {
        $jamaah = Jamaah::findOrFail($id_jamaah);
        $payment = payment::findOrFail($request->nomor_transaksi);
        DB::beginTransaction();
        try {
        	$jamaah->id_user = $payment->id_user;
        	$jamaah->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        try {
        	$booking = Booking::where('id_jamaah', $id_jamaah)->first();
        	$booking->id_voucher = $request->voucher;
        	$booking->id_transaksi = $request->nomor_transaksi;
            $booking->nama_pemesan = $request->nama_pemesan;
        	$booking->status_pemesan = $request->status_pemesan;
        	$booking->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        try {
        	$paspor = Paspor::where('id_jamaah', $id_jamaah)->first();
        	$paspor->nomor_paspor = $request->nomor_paspor;
        	$paspor->jenis_kelamin = $request->jenis_kelamin;
        	$paspor->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        try {
            $log = new Log;
            $log->id_admin = \Auth::guard('admin')->user()->id_admin;
            $log->isi_log = 'Mengubah data jamaah dengan nama jamaah '.$paspor->nama_paspor;
            $log->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()
                ->withErrors($e->getErrors());
        } catch(\Execption $e){
            DB::rollback();
            throw $e;
        }

        DB::commit();
    	return redirect('index/admin/data-booking/jamaah')->withSuccess('Berhasil Mengubah Data Jamaah');
    }

    public function delete($id_jamaah)
    {
    	$booking = Booking::where('id_jamaah', $id_jamaah)->delete();
        $nama_paspor = Paspor::where('id_jamaah', $id_jamaah)->first();
    	$paspor = Paspor::where('id_jamaah', $id_jamaah)->delete();
    	$jamaah = Jamaah::findOrFail($id_jamaah)->delete();
        $kuota_kloter = DB::table('tbl_kuota_kloter')->where('id_jamaah', $id_jamaah)->delete();
        $kuota_bus = DB::table('tbl_kuota_bus')->where('id_jamaah', $id_jamaah)->delete();
        $kuota_kamar = DB::table('tbl_kuota_kamar')->where('id_jamaah', $id_jamaah)->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus jamaah dengan nama jamaah '.$nama_paspor->nama_paspor;
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Menghapus Data Jamaah');
    }
}
