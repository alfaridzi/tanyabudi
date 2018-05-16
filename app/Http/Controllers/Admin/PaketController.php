<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Paket\TambahPaketRequest;
use App\Http\Requests\Admin\Paket\EditPaketRequest;
use File;

use App\Model\Admin\Paket;
use App\produk;
use App\Model\Admin\Log;

class PaketController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu paket haji umroh']);
    }

    public function index()
    {
    	$produk = DB::table('tbl_produk')
                    ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
                    ->whereIn('tbl_produk.type', ['1', '2'])->orderBy('id_paket', 'desc')
                    ->paginate(15);

    	return view('admin.paket.paket', compact('produk'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $status = $request->status_paket;
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_akhir = $request->tanggal_akhir;
        $kategori = $request->kategori;

        $produk = DB::table('tbl_produk')
                    ->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')
                    ->where(function($q) use ($keyword){
                        if (!is_null($keyword)) {
                            $q->where('tbl_produk.nama', 'like', '%'.$keyword.'%')
                            ->orWhere('tbl_produk.desc_prod', 'like', '%'.$keyword.'%')
                            ->orWhere('tbl_paket.perjalanan', 'like', '%'.$keyword.'%');
                        }
                    })->where(function($q) use($status){
                        if (!is_null($status)) {
                            $q->where('status_paket', $status);
                        }
                    })->where(function($q) use($kategori){
                        if (!is_null($kategori)) {
                            $q->where('type', $kategori);
                        }else{
                            $q->whereIn('tbl_produk.type', ['1', '2']);
                        }
                    })->where(function($q) use($tanggal_mulai){
                        if (!is_null($tanggal_mulai)) {
                            $q->where('tanggal_mulai', $tanggal_mulai);
                        }
                    })->where(function($q) use($tanggal_akhir){
                        if (!is_null($tanggal_akhir)) {
                            $q->where('tanggal_akhir', $tanggal_akhir);
                        }
                    })
                    ->orderBy('id_paket', 'desc')
                    ->paginate(15);
        return view('admin.paket.paket', compact('produk'));
    }

    public function status($id_produk)
    {
        $produk = Paket::where('id_produk', $id_produk)->first();
        if (!$produk) {
            abort(404);
        }

		if ($produk->status_paket == '0') {
    		$status_paket = '1';
    	}else{
    		$status_paket = '0';
    	}

    	$produk->update(['status_paket' => $status_paket]);

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah status paket haji umroh dengan nama paket '.$produk->nama;
        $log->save();

    	return redirect()->back()->withSuccess('Berhasil Mengubah Data');
    }

    public function create()
    {
    	return view('admin.paket.tambah_paket', compact('produk'));
    }

    public function store(TambahPaketRequest $request)
    {
    	$kategori = $request->kategori;
    	$produk = new produk;
    	$produk->nama = $request->nama_paket;
    	$produk->harga = $request->harga;
    	$produk->desc_prod = $request->deskripsi_paket;
    	if (!is_null($request->file('gambar'))) { // jika gambar tidak kosong
			$gambar = $request->file('gambar');
    		$extension = $gambar->getClientOriginalExtension();
    		$namaFile = str_slug($request->nama_paket).'-'.str_random(5).'.'.$extension;
	    	if ($kategori == 1) {
    			$gambar->move('assets/images/paket/haji/',$namaFile);
    		}elseif ($kategori == 2) {
    			$gambar->move('assets/images/paket/umroh/',$namaFile);
    		}
    		$produk->gambar = $namaFile;
		}else{
			$produk->gambar = null;
		}
		$produk->type = $request->kategori;
		$produk->save();

    	$paket = new Paket;
    	$paket->id_produk = $produk->id;
    	$paket->perjalanan = $request->perjalanan;
    	$paket->kuota = $request->kuota;
    	$paket->sekamar = $request->sekamar;
    	$paket->nama_travel = $request->nama_travel;
    	$paket->id_travel = $request->id_travel;
    	if (!is_null($request->file('gambar_travel'))) { // jika gambar tidak kosong
			$gambar = $request->file('gambar_travel');
    		$extension = $gambar->getClientOriginalExtension();
    		$namaFile = str_slug($request->nama_travel).'-'.str_random(5).'.'.$extension;
    		$gambar->move('admin/images/logo_travel/',$namaFile);
    		$paket->gambar_travel = $namaFile;
		}else{
			$paket->gambar_travel = null;
		}
		$paket->keberangkatan = $request->keberangkatan;
		$paket->tanggal_mulai = $request->tanggal_mulai;
		$paket->tanggal_akhir = $request->tanggal_akhir;
		$paket->save();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan paket haji umroh baru dengan nama paket '.$produk->nama;
        $log->save();

		return redirect('index/admin/paket')->withSuccess('Berhasil Menambahkan Paket');
    }

    public function edit($id_produk)
    {
    	$produk = DB::table('tbl_produk')->leftJoin('tbl_paket', 'tbl_produk.id', '=', 'tbl_paket.id_produk')->where('tbl_produk.id', $id_produk)->whereIn('tbl_produk.type', ['1', '2'])->first();

    	if (is_null($produk)) {
    		abort(404);
    	}

    	return view('admin.paket.edit_paket', compact('produk'));
    }

    public function update(EditPaketRequest $request, $id_produk)
    {
    	$kategori = $request->kategori;
    	$produk = Produk::findOrFail($id_produk);
    	$produk->nama = $request->nama_paket;
    	$produk->harga = $request->harga;
    	$produk->desc_prod = $request->deskripsi_paket;
    	if ($kategori == '1') {
    		$direktori = 'assets/images/paket/haji/';
    	}elseif($kategori == '2'){
    		$direktori = 'assets/images/paket/umroh/';
    	}
    	if (!is_null($request->file('gambar'))) { // jika gambar tidak kosong
    		if (File::exists($direktori.$produk->gambar)) {
    			File::delete($direktori.$produk->gambar);
    		}
			$gambar = $request->file('gambar');
    		$extension = $gambar->getClientOriginalExtension();
    		$namaFile = str_slug($request->nama_paket).'-'.str_random(5).'.'.$extension;
	    	if ($kategori == 1) {
    			$gambar->move('assets/images/paket/haji/',$namaFile);
    		}elseif ($kategori == 2) {
    			$gambar->move('assets/images/paket/umroh/',$namaFile);
    		}
    		$produk->gambar = $namaFile;
		}
		$produk->type = $request->kategori;
		$produk->save();

    	$paket = Paket::where('id_produk', $id_produk)->first();
    	$paket->id_produk = $produk->id;
    	$paket->perjalanan = $request->perjalanan;
    	$paket->kuota = $request->kuota;
    	$paket->sekamar = $request->sekamar;
    	$paket->nama_travel = $request->nama_travel;
    	$paket->id_travel = $request->id_travel;
    	if (!is_null($request->file('gambar_travel'))) { // jika gambar tidak kosong
    		if (File::exists('admin/images/logo_travel/'.$paket->gambar_travel)) {
    			File::delete('admin/images/logo_travel/'.$paket->gambar_travel);
    		}
			$gambar = $request->file('gambar_travel');
    		$extension = $gambar->getClientOriginalExtension();
    		$namaFile = str_slug($request->nama_travel).'-'.str_random(5).'.'.$extension;
    		$gambar->move('admin/images/logo_travel/',$namaFile);
    		$paket->gambar_travel = $namaFile;
		}
		$paket->keberangkatan = $request->keberangkatan;
		$paket->tanggal_mulai = $request->tanggal_mulai;
		$paket->tanggal_akhir = $request->tanggal_akhir;
		$paket->save();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data paket haji umroh dengan nama paket '.$produk->nama;
        $log->save();

		return redirect('index/admin/paket')->withSuccess('Berhasil Mengubah Paket');
    }

    public function delete($id_produk)
    {
    	$produk = Produk::findOrFail($id_produk);
        $nama_produk = $produk->nama;
    	$paket = Paket::where('id_produk', $id_produk)->first();
    	if (File::exists('admin/images/logo_travel/'.$paket->gambar_travel)) {
			File::delete('admin/images/logo_travel/'.$paket->gambar_travel);
		}
		$produk->delete();
		$paket->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus paket haji umroh dengan nama paket '.$nama_produk;
        $log->save();

		return redirect()->back()->withSuccess('Berhasil Menghapus Paket');
    }
}
