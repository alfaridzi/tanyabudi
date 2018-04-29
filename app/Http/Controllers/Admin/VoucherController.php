<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Voucher\TambahVoucherRequest;
use App\Http\Requests\Admin\Voucher\EditVoucherRequest;
use Carbon\Carbon;

use App\Model\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $voucher = DB::table('tbl_voucher')->orderBy('id_voucher', 'desc')->paginate(15);
    	return view('admin.voucher.voucher', compact('voucher'));
    }

    public function create()
    {
    	return view('admin.voucher.tambah_voucher');
    }

    public function store(TambahVoucherRequest $request)
    {
    	$tanggal_mulai = Carbon::parse($request->tanggal_mulai)->startOfDay();
    	$tanggal_akhir = Carbon::parse($request->tanggal_akhir)->endOfDay();

    	$voucher = new Voucher;

    	$voucher->kode_voucher = $request->kode_voucher;
    	$voucher->pemilik = $request->pemilik;
    	$voucher->nama_voucher = $request->nama_voucher;
    	$voucher->kategori = $request->kategori;
    	$voucher->nominal  = $request->nominal;
    	$voucher->tanggal_mulai = $tanggal_mulai;
    	$voucher->tanggal_akhir = $tanggal_akhir;

    	$voucher->save();

    	return redirect('index/admin/voucher')->withSuccess('Berhasil Menambahkan Voucher Baru');
    }

    public function edit($id_voucher)
    {
        $voucher = Voucher::findOrFail($id_voucher);
        return view('admin.voucher.edit_voucher', compact('voucher'));
    }

    public function update(EditVoucherRequest $request, $id_voucher)
    {
        $voucher = Voucher::findOrfail($id_voucher);

        $tanggal_mulai = Carbon::parse($request->tanggal_mulai)->startOfDay();
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->endOfDay();

        $voucher->kode_voucher = $request->kode_voucher;
        $voucher->pemilik = $request->pemilik;
        $voucher->nama_voucher = $request->nama_voucher;
        $voucher->kategori = $request->kategori;
        $voucher->nominal  = $request->nominal;
        $voucher->tanggal_mulai = $tanggal_mulai;
        $voucher->tanggal_akhir = $tanggal_akhir;

        $voucher->save();

        return redirect('index/admin/voucher')->withSuccess('Berhasil Mengubah Voucher');
    }

    public function delete($id_voucher)
    {
        $voucher = Voucher::findOrFail($id_voucher);
        $voucher->delete();

        return redirect()->back()->withSuccess('Berhasil Menghapus Voucher');
    }
}
