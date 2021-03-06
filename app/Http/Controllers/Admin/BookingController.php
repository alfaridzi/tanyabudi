<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Booking\EditBookingRequest;

use App\Model\Admin\Booking;
use App\Model\Admin\Log;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu booking']);
    }

    public function index()
    {
    	$booking = DB::table('tbl_booking')
                        ->rightJoin('tbl_jamaah', 'tbl_booking.id_jamaah', '=', 'tbl_jamaah.id_jamaah')
                        ->rightJoin('tbl_paspor', 'tbl_paspor.id_jamaah', '=', 'tbl_jamaah.id_jamaah')
                        ->leftJoin('tbl_payment', 'tbl_booking.id_transaksi', '=', 'tbl_payment.id')
                        ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                        ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
                        ->orderBy('id_booking', 'desc')
                        ->paginate(15);

    	return view('admin.data_booking.booking.booking', compact('booking'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $booking = DB::table('tbl_booking')
                    ->rightJoin('tbl_jamaah', 'tbl_booking.id_jamaah', '=', 'tbl_jamaah.id_jamaah')
                    ->rightJoin('tbl_paspor', 'tbl_paspor.id_jamaah', '=', 'tbl_jamaah.id_jamaah')
                    ->leftJoin('tbl_payment', 'tbl_booking.id_transaksi', '=', 'tbl_payment.id')
                    ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                    ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
                    ->where('kode_booking', 'like', '%'.$keyword.'%')
                    ->orWhere('id_transaksi', 'like', '%'.$keyword.'%')
                    ->orWhere('nama_paspor', 'like', '%'.$keyword.'%')->orderBy('id_booking', 'desc')->paginate(15);
        
        return view('admin.data_booking.booking.booking', compact('booking'));  
    }

    public function edit($id_booking)
    {
    	$booking = Booking::find($id_booking);
    	$voucher = DB::table('tbl_voucher')
                        ->addSelect('tbl_booking.*', 'tbl_booking.id_voucher as id_voucher_booking')
                        ->addSelect('tbl_voucher.*')
                        ->leftJoin('tbl_booking', 'tbl_voucher.id_voucher', '=', 'tbl_booking.id_voucher')
                        ->where('tbl_booking.id_jamaah', $booking->id_jamaah)
                        ->orWhere('tbl_booking.id_voucher', null)
                        ->where('tanggal_akhir', '>', date('Y-m-d H:i:s'))->where('status_voucher', '0')->get();

    	return view('admin.data_booking.booking.edit_booking', compact('booking', 'voucher'));
    }

    public function update(EditBookingRequest $request, $id_booking)
    {
    	$booking = Booking::findOrFail($id_booking);
    	$booking->id_voucher = $request->voucher;
    	$booking->status_pemesan = $request->status_pemesan;
    	$booking->save();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data booking dengan kode booking '.$booking->kode_booking;
        $log->save();

    	return redirect('index/admin/data-booking/booking')->withSuccess('Berhasil Mengubah Data Booking');
    }

    public function print($id_booking)
    {
        $booking = Booking::findOrFail($id_booking);

        $voucher = DB::table('tbl_booking')->addSelect('tbl_booking.*')
                        ->addSelect('tbl_jamaah.*')
                        ->addSelect('tbl_paspor.*')
                        ->addSelect('tbl_voucher.*')
                        ->addSelect('tbl_produk.*')
                        ->addSelect('tbl_paket.*')
                        ->addSelect('provinces.*', 'provinces.name as nama_provinsi')
                        ->addSelect('regencies.*', 'regencies.name as nama_kota')
                        ->leftJoin('tbl_jamaah', 'tbl_booking.id_jamaah', '=', 'tbl_jamaah.id_jamaah')
                        ->leftJoin('tbl_paspor', 'tbl_jamaah.id_jamaah', '=', 'tbl_paspor.id_jamaah')
                        ->leftJoin('tbl_payment', 'tbl_booking.id_transaksi', '=', 'tbl_payment.id')
                        ->leftJoin('tbl_produk', 'tbl_payment.id_prod', '=', 'tbl_produk.id')
                        ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
                        ->leftJoin('tbl_voucher', 'tbl_booking.id_voucher', 'tbl_voucher.id_voucher')
                        ->leftJoin('provinces', 'tbl_paspor.provinsi', '=', 'provinces.id')
                        ->leftJoin('regencies', 'tbl_paspor.kota', '=', 'regencies.id')
                        ->where('tbl_booking.id_booking', $id_booking)->first();
        
        return view('admin.voucher.print_voucher', compact('voucher'));
    }
}
