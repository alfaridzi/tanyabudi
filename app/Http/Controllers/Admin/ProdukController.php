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
use App\Model\Admin\Log;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:menu produk']);
    }

    public function index($produk)
    {
    	$namaProduk = $produk;
    	if ($produk) {
	    	if ($produk == 'wisata') {
	    		$tipe = 3;
	    	}elseif ($produk == 'sedekah') {
	    		$tipe = 4;
            }elseif ($produk == 'agen') {
                $tipe = 5;
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
    		if ($produk == 'wisata') {
	    		$tipe = 3;
	    	}elseif ($produk == 'sedekah') {
	    		$tipe = 4;
            }elseif ($produk == 'agen') {
                $tipe = 5;
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
        $tipe_produk =$request->tipe;
    	$produk->nama = $request->nama_produk;
    	$produk->desc_prod = $request->desc_prod;

        if (!is_null($request->file('gambar'))) { // jika gambar tidak kosong
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $namaFile = str_slug($request->nama_produk).'-'.str_random(5).'.'.$extension;
            $gambar->move('assets/images/paket/wisata/',$namaFile);
            $produk->gambar = $namaFile;
        }else{
            $produk->gambar = null;
        }

    	$produk->type = $request->tipe;
        $produk->harga = $request->harga;
        $tipe_produk = $request->tipe;

       	$produk->save();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menambahkan produk baru dengan nama '.$produk->nama;
        $log->save();

       	if ($tipe_produk == 3) {
			return redirect('index/admin/produk/wisata')->withSuccess('Berhasil Menambahkan Produk Baru');
		}elseif ($tipe_produk == 4) {
			return redirect('index/admin/produk/sedekah')->withSuccess('Berhasil Menambahkan Produk Baru');
		}elseif ($tipe_produk == 5) {
            return redirect('index/admin/produk/agen')->withSuccess('Berhasil Menambahkan Produk Baru');
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
        if (!is_null($request->file('gambar'))) { // jika gambar tidak kosong
            if (File::exists('assets/images/paket/wisata/'.$produk->gambar)) {
                File::delete('assets/images/paket/wisata/'.$produk->gambar);
            }
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $namaFile = str_slug($request->nama_paket).'-'.str_random(5).'.'.$extension;
            $gambar->move('assets/images/paket/wisata/',$namaFile);
            $produk->gambar = $namaFile;
        }
    	$produk->updated_at = Carbon::now();
        $produk->harga = $request->harga;
    	$tipe_produk = $produk->type;
        $produk->harga = $request->harga;

       	$produk->save();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Mengubah data produk dengan nama '.$produk->nama;
        $log->save();

       	if ($tipe_produk == 3) {
			return redirect('index/admin/produk/wisata')->withSuccess('Berhasil Mengubah Produk');
		}elseif ($tipe_produk == 4) {
			return redirect('index/admin/produk/sedekah')->withSuccess('Berhasil Mengubah Produk');
		}elseif ($tipe_produk == 5) {
            return redirect('index/admin/produk/agen')->withSuccess('Berhasil Mengubah Produk Baru');
        }
    }

    public function delete($id)
    {
    	$produk = produk::findOrFail($id);
        $nama = $produk->nama;

		$produk->delete();

        $log = new Log;
        $log->id_admin = \Auth::guard('admin')->user()->id_admin;
        $log->isi_log = 'Menghapus produk dengan nama '.$nama;
        $log->save();

		return redirect()->back()->withSuccess('Berhasil Menghapus Produk');
    }
}
