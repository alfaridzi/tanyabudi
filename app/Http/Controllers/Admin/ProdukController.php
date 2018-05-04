<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Produk\TambahProdukRequest;
use App\Http\Requests\Admin\Produk\EditProdukRequest;
use File;
use Carbon\Carbon;

use App\produk;

class ProdukController extends Controller
{
    public function index($produk)
    {
    	$namaProduk = $produk;
    	if ($produk) {
    		if ($namaProduk == 'haji') {
	    		$tipe = 1;
	    	}elseif ($produk == 'umroh') {
	    		$tipe = 2;
	    	}elseif ($produk == 'wisata') {
	    		$tipe = 3;
	    	}elseif ($produk == 'sedekah') {
	    		$tipe = 4;
			}elseif ($produk == 'tabungan') {
				$tipe = 3949;
	    	}
	    	$produk = DB::table('tbl_produk')->where('type', $tipe)->orderBy('id', 'desc')->paginate(15);
    		return view('admin.produk.produk', compact('produk', 'tipe', 'namaProduk'));
    	}else{
    		abort(404);
    	}
    }

    public function search(Request $request, $produk)
    {
    	$namaProduk = $produk;
    	$keyword = $request->search;
    	if ($produk) {
    		if ($namaProduk == 'haji') {
	    		$tipe = 1;
	    	}elseif ($produk == 'umroh') {
	    		$tipe = 2;
	    	}elseif ($produk == 'wisata') {
	    		$tipe = 3;
	    	}elseif ($produk == 'sedekah') {
	    		$tipe = 4;
			}elseif ($produk == 'tabungan') {
				$tipe = 3949;
	    	}
	    	$produk = DB::table('tbl_produk')->where('type', $tipe)->where(function($q) use($keyword){
	    		$q->orWhere('nama', 'like', '%'.$keyword.'%')->orWhere('desc_prod', 'like', '%'.$keyword.'%')->orWhere('harga', 'like', '%'.$keyword.'%');
	    	})->orderBy('id', 'desc')->paginate(15);
    		return view('admin.produk.produk', compact('produk', 'tipe', 'namaProduk'));
    	}else{
    		abort(404);
    	}
    }

    public function create()
    {
    	return view('admin.produk.tambah_produk');
    }

    public function store(TambahProdukRequest $request)
    {
    	$produk = new produk;

    	$produk->nama = $request->nama_produk;
    	$produk->desc_prod = $request->desc_prod;
    	$produk->type = $request->tipe;

    	$tipe_produk = $request->tipe;

    	if ($tipe_produk == 1 || $tipe_produk == 2 || $tipe_produk == 3) { // jika tipe produk sama dengan 1, 2 atau 3
    		$produk->harga = $request->harga;
    		if (!is_null($request->file('gambar'))) { // jika gambar tidak kosong
    			$gambar = $request->file('gambar');
	    		$extension = $gambar->getClientOriginalExtension();
	    		$namaFile = str_slug($request->nama_produk).'-'.str_random(5).'.'.$extension;
		    	if ($tipe_produk == 1) {
	    			$gambar->move('assets/images/paket/haji/',$namaFile);
	    		}elseif ($tipe_produk == 2) {
	    			$gambar->move('assets/images/paket/umroh/',$namaFile);
	    		}elseif ($tipe_produk == 3) {
	    			$gambar->move('assets/images/paket/wisata/',$namaFile);
	    		}
	    		$produk->gambar = $namaFile;
    		}else{
    			$produk->gambar = null;
    		}
       	}else{
       		$produk->harga = null;
       		$produk->gambar = "";
       	}
       	$produk->save();

       	if ($tipe_produk == 1) {
			return redirect('index/admin/produk/haji')->withSuccess('Berhasil Menambahkan Produk Baru');
		}elseif ($tipe_produk == 2) {
			return redirect('index/admin/produk/umroh')->withSuccess('Berhasil Menambahkan Produk Baru');
		}elseif ($tipe_produk == 3) {
			return redirect('index/admin/produk/wisata')->withSuccess('Berhasil Menambahkan Produk Baru');
		}elseif ($tipe_produk == 4) {
			return redirect('index/admin/produk/sedekah')->withSuccess('Berhasil Menambahkan Produk Baru');
		}elseif ($tipe_produk == 3949) {
			return redirect('index/admin/produk/tabungan')->withSuccess('Berhasil Menambahkan Produk Baru');
		}
    }

    public function edit($id)
    {
    	$produk = produk::findOrFail($id);
    	return view('admin.produk.edit_produk', compact('produk'));
    }

    public function update(EditProdukRequest $request, $id)
    {
    	$produk = produk::findOrFail($id);

    	$produk->nama = $request->nama_produk;
    	$produk->desc_prod = $request->desc_prod;
    	$produk->updated_at = Carbon::now();

    	$tipe_produk = $produk->type;

    	if ($tipe_produk == 1 || $tipe_produk == 2 || $tipe_produk == 3) { // jika tipe produk sama dengan 1, 2 atau 3
    		$produk->harga = $request->harga;
    		if (!is_null($request->file('gambar'))) { // jika gambar tidak kosong

    			if ($tipe_produk == 1) {
	    			$direktori = 'assets/images/paket/haji/';
	    		}elseif ($tipe_produk == 2) {
	    			$direktori = 'assets/images/paket/umroh/';
	    		}elseif ($tipe_produk == 3) {
	    			$direktori = 'assets/images/paket/wisata/';
	    		}

    			if (File::exists($direktori.$produk->gambar)) {
    				File::delete($direktori.$produk->gambar);
    			}
    			$gambar = $request->file('gambar');
	    		$extension = $gambar->getClientOriginalExtension();
	    		$namaFile = str_slug($request->nama_produk).'-'.str_random(5).'.'.$extension;
		    	if ($tipe_produk == 1) {
	    			$gambar->move($direktori,$namaFile);
	    		}elseif ($tipe_produk == 2) {
	    			$gambar->move($direktori,$namaFile);
	    		}elseif ($tipe_produk == 3) {
	    			$gambar->move($direktori,$namaFile);
	    		}
	    		$produk->gambar = $namaFile;
    		}else{
    			$produk->gambar = null;
    		}
       	}else{
       		$produk->harga = null;
       		$produk->gambar = "";
       	}
       	$produk->save();

       	if ($tipe_produk == 1) {
			return redirect('index/admin/produk/haji')->withSuccess('Berhasil Mengubah Produk');
		}elseif ($tipe_produk == 2) {
			return redirect('index/admin/produk/umroh')->withSuccess('Berhasil Mengubah Produk');
		}elseif ($tipe_produk == 3) {
			return redirect('index/admin/produk/wisata')->withSuccess('Berhasil Mengubah Produk');
		}elseif ($tipe_produk == 4) {
			return redirect('index/admin/produk/sedekah')->withSuccess('Berhasil Mengubah Produk');
		}elseif ($tipe_produk == 3949) {
			return redirect('index/admin/produk/tabungan')->withSuccess('Berhasil Mengubah Produk');
		}
    }

    public function delete($id)
    {
    	$produk = produk::findOrFail();
    	$tipe_produk = $produk->type;

    	if ($tipe_produk == 1) {
			$direktori = 'assets/images/paket/haji/';
		}elseif ($tipe_produk == 2) {
			$direktori = 'assets/images/paket/umroh/';
		}elseif ($tipe_produk == 3) {
			$direktori = 'assets/images/paket/wisata/';
		}

		if (File::exists($direktori.$produk->gambar)) {
			File::delete($direktori.$produk->gambar);
		}

		$produk->delete();
		return redirect()->back()->withSuccess('Berhasil Menghapus Produk');
    }
}
