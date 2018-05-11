<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\pembayaran;
use App\history;
use App\payment;
use Auth;
class produkController extends Controller
{
	public function detail_produk($id) {
		$produk = produk::find($id);
		return view('umum.detail_paket', compact('produk'));
	}


	public function intruksi($id) {
		$produk = produk::find($id);
		return view('umum.intruksi_produk', compact('produk'));
	}

	public function intruksi_wisata($id) {
		$produk = produk::find($id);
		$harga = request()->jumlah_harga;
		return view('umum.intruksi_wisata', compact('produk','harga'));
	}

	public function konfirmasi_wisata($id) {
		$produk = produk::find($id);
		$jumlah_pembayaran = request()->jumlah_harga;
		
		return view('umum.konfirmasi_pembayaran',compact('produk','jumlah_pembayaran'));
	}

	public function konfirmasi($id) {
		$produk = produk::find($id);
		return view('umum.konfirmasi_pembayaran',compact('produk'));
	}


	public function konfirmasi_sedekah() {
		$produk = produk::find(request()->type);
		$jumlah_pembayaran = request()->jumlah_pembayaran;
		return view('umum.konfirmasi_pembayaran',compact('produk','jumlah_pembayaran'));
	}



	public function selesai($id) {
		$data = request()->all();
		$data['id_user'] = Auth::user()->id;

		if($id == 'tabungan') {
			$data['id_prod'] = '3910';
		} else if($id == 'topup') {
			$data['id_prod'] = '3911';
		}else {
			$data['id_prod'] = $id;
		}

		

		if($id != 'tabungan' || $id != 'topup') {
			$prod = produk::find($id);
		}
		
		$jam = date('H:i');
		$date = date('d-m-Y');

		if($id == 'tabungan') {
			$title = 'Penambahan saldo tabungan';
			$info = 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.'.number_format(request()->jumlah_pembayaran,0,'.','.');
		} else if($id == 'topup') {
			$title = 'Penambahan saldo bayar bayar';
			$info = 'Melakukan Request Penambahan saldo bayar bayar sebesar Rp.'.number_format(request()->jumlah_pembayaran,0,'.','.');
		}else {
			if($prod->type == 4) {
				$title = 'Pembayaran sedekah';
			}

			if($prod->type == 3) {
				$title = 'pembayaran Wisata';
			}


			if($prod->type == 2 || $prod->id == 1) {
				$title = 'Pembayaran Umroh & Haji';
			}
			$info = 'Melakukan pembayaran '.$prod->nama;
		}
		
		
		$cek = Payment::orderBy('counter','asc')->get()->last();
		if(is_null($cek)) {
			$last = 1;
		} else {
			$last = $cek->counter + 1;
		}
		
		$imageName = time().'.'.request()->foto->getClientOriginalExtension();
		$data['foto'] = $imageName;
		$data['id'] = 'TRX'.$last.$id.'.'.date('Ymd').'.'.Auth::user()->id;
		$data['counter'] = $last;



		$datas['id_user'] = Auth::user()->id;
		$datas['title'] = $title;
		$jam = date('H:i');
		$date = date('d-m-Y');
		$datas['info'] = $info;
		$datas['jam'] = $jam;
		$datas['tanggal'] = $date;


        request()->foto->move(public_path('bukti-tf'), $imageName);
        payment::create($data);
        history::create($datas);

        return view('pendaftaran_berhasil');
	}
}

