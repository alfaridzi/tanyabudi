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

    public function search(Request $request)
    {
        $keyword = strtolower($request->search);
        $kategori = $request->kategori;
        if (!is_null($request->status_expired)) {
            $status_expired = $request->status_expired == 0 ? '>' : '<';
            $tanggal = date('Y-m-d H:i:s');
        }else{
            $status_expired = '';
            $tanggal = '';
        }
        $status_voucher = $request->status_voucher;

        $voucher = DB::table('tbl_voucher')->where(function($q) use ($kategori, $status_expired, $status_voucher, $tanggal){
            $q->where('kategori', $kategori)->orWhere('status_voucher', $status_voucher)->orWhere('tanggal_akhir', $status_expired, $tanggal);
        })->where(function($q) use($keyword){
            $q->where('kode_voucher', 'like', '%'.$keyword.'%')->orWhere('pemilik', 'like', '%'.$keyword.'%')->orWhere('nama_voucher', 'like', '%'.$keyword.'%')->orWhere('nominal', 'like', '%'.$keyword.'%');
        })->orderBy('id_voucher', 'desc')->paginate(15);
        return view('admin.voucher.voucher', compact('voucher'));
    }

    public function create()
    {
        $agen = DB::table('users')->where('type', 2)->get();
    	return view('admin.voucher.tambah_voucher', compact('agen'));
    }

    public function store(TambahVoucherRequest $request)
    {
        function BigRandomNumber($min, $max) {
          $difference   = bcadd(bcsub($max,$min),1);
          $rand_percent = bcdiv(mt_rand(), mt_getrandmax(), 8); // 0 - 1.0
          return bcadd($min, bcmul($difference, $rand_percent, 8), 0);
        }   
    	$tanggal_mulai = Carbon::parse($request->tanggal_mulai)->startOfDay();
    	$tanggal_akhir = Carbon::parse($request->tanggal_akhir)->endOfDay();
        do {
            $nomor_voucher = BigRandomNumber(0, 99999999999);
            $cari_nomor = DB::table('tbl_voucher')->where('nomor_voucher', $nomor_voucher)->first();
        } while (!is_null($cari_nomor));

    	$voucher = new Voucher;

    	$voucher->kode_voucher = $request->kode_voucher;
        $voucher->nomor_voucher = $nomor_voucher;
        $voucher->id_agen = $request->agen;
    	$voucher->pemilik = $request->pemilik;
    	$voucher->nama_voucher = $request->nama_voucher;
    	$voucher->kategori = $request->kategori;
    	$voucher->nominal  = $request->nominal;
    	$voucher->tanggal_mulai = $tanggal_mulai;
    	$voucher->tanggal_akhir = $tanggal_akhir;

    	$voucher->save();

    	return redirect('index/admin/voucher')->withSuccess('Berhasil Menambahkan Voucher Baru');
    }

    public function print($id_voucher)
    {
        $voucher = Voucher::findOrfail($id_voucher);
        return view('admin.voucher.print_voucher', compact('voucher'));
    }

    public function edit($id_voucher)
    {
        $voucher = Voucher::findOrFail($id_voucher);
        $agen = DB::table('users')->where('type', 2)->get();
        return view('admin.voucher.edit_voucher', compact('voucher', 'agen'));
    }

    public function update(EditVoucherRequest $request, $id_voucher)
    {
        $voucher = Voucher::findOrfail($id_voucher);

        $tanggal_mulai = Carbon::parse($request->tanggal_mulai)->startOfDay();
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->endOfDay();

        $voucher->kode_voucher = $request->kode_voucher;
        $voucher->pemilik = $request->pemilik;
        $voucher->id_agen = $request->agen;
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
