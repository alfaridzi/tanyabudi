<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Model\Admin\Booking;
use App\Model\Voucher;
use App\tabungan;

class RedeemVoucherController extends Controller
{
    public function redeemVoucher($kode_voucher)
    {
    	$user = Auth::user();
    	$voucher = DB::table('tbl_jamaah')
    					->leftJoin('tbl_booking', 'tbl_jamaah.id_jamaah', '=', 'tbl_booking.id_jamaah')
    					->leftJoin('tbl_voucher', 'tbl_booking.id_voucher', '=', 'tbl_voucher.id_voucher')
    					->where('tbl_jamaah.id_user', $user->id)
    					->where('tbl_voucher.kode_voucher', $kode_voucher)
    					->first();

    	if (is_null($voucher)) {
    		return 'Voucher Tidak Ditemukan';
    	}elseif ($voucher->status_voucher == '1') {
            return 'Voucher Sudah Terpakai';
        }

    	$tabungan = tabungan::where('id_user', $voucher->id_user)->firstOrFail();
    	$tambah_tabungan = $tabungan->tabungan + $voucher->nominal;

    	$tabungan->tabungan = $tambah_tabungan;
    	$tabungan->save();

    	$dataVoucher = Voucher::where('kode_voucher', $voucher->kode_voucher)->firstOrFail();
    	$dataVoucher->status_voucher = '1';
    	$dataVoucher->save();

    	if ($user->type == '1') {
    		return redirect('dashboard');
    	}elseif($user->type == '2') {
    		return redirect('tabungan-haji-umroh')
    	}
    }
}
