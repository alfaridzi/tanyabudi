<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Booking\EditBookingRequest;

use App\Model\Admin\Booking;

class BookingController extends Controller
{
    public function index()
    {
    	$booking = DB::table('tbl_booking')->join('tbl_jamaah', 'tbl_booking.id_jamaah', '=', 'tbl_jamaah.id_jamaah')->orderBy('id_booking', 'desc')->paginate(15);

    	return view('admin.data_booking.booking.booking', compact('booking'));
    }

    public function edit($id_booking)
    {
    	$booking = Booking::find($id_booking);
    	$voucher = DB::table('tbl_voucher')->addSelect('tbl_booking.*', 'tbl_booking.id_voucher as id_voucher_booking')->addSelect('tbl_voucher.*')->leftJoin('tbl_booking', 'tbl_voucher.id_voucher', '=', 'tbl_booking.id_voucher')->where('tbl_booking.id_jamaah', $booking->id_jamaah)->orWhere('tbl_booking.id_voucher', null)->where('tanggal_akhir', '>', date('Y-m-d H:i:s'))->where('status_voucher', '0')->get();

    	return view('admin.data_booking.booking.edit_booking', compact('booking', 'voucher'));
    }

    public function update(EditBookingRequest $request, $id_booking)
    {
    	$booking = Booking::findOrFail($id_booking);
    	$booking->id_voucher = $request->voucher;
    	$booking->nomor_transaksi = $request->nomor_transaksi;
    	$booking->status_pemesan = $request->status_pemesan;
    	$booking->save();

    	return redirect('index/admin/data-booking/booking')->withSuccess('Berhasil Mengubah Data Booking');
    }
}
