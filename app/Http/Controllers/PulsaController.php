<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pulsa;
use App\history;
use Auth;
use Redirect;
use App\ppob;

class PulsaController extends Controller
{


	 public function telkomsel() {
    	$pulsa = Pulsa::cekHarga('S')->message;
    	$name = 'Pulsa Telkomsel';
    	
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }

    public function tri() {
    	$pulsa = Pulsa::cekHarga('T')->message;
    	$name = 'Pulsa Tri';
    	
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }


    public function indosat() {
    	$pulsa = Pulsa::cekHarga('I')->message;
    	$name = 'Pulsa Indosat';
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }


    public function smartfren() {
    	$pulsa = Pulsa::cekHarga('SM')->message;
    	$name = 'Pulsa Smartfren';
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }


    public function xl() {
    	$pulsa = Pulsa::cekHarga('X')->message;
    	$name = 'Pulsa Xl';
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }


    public function axis() {
    	$pulsa = Pulsa::cekHarga('AX')->message;
    	$name = 'Pulsa Axis';
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }


    public function pln() {
    	$pulsa = Pulsa::cekHarga('PLN')->message;
    	$name = 'TOKEN PLN';
    	return view('umum.bayar-bayar.pln', compact('pulsa','name'));
    }


    public function index() {

    	$data = ppob::where('id_user',Auth::user()->id)->get();
    	return view('umum.bayar_bayar', compact('data'));
    }


    public function proses(Request $request) {
    	$code = $request->code;
    	$nomor = $request->nomor;
    	$id = 'TRX'.$code.date('Ymd').rand(0000,9999);

    	$harga = Pulsa::cekHarga($code)->message[0]->price;

    	$pulsa = Pulsa::prosesPulsa($code, $nomor, $id);

    	$datas['id_user'] = Auth::user()->id;
		$datas['title'] = 'Pembayaran '.$id;
		$jam = date('H:i');
		$date = date('d-m-Y');
		$datas['info'] = $pulsa->message;
		$datas['jam'] = $jam;
		$datas['tanggal'] = $date;
		history::create($datas);

		$dt['id_user'] = Auth::user()->id;
		$dt['id_pulsa'] = $id;
		$dt['jumlah_pembayaran'] = $harga;
		$dt['tgl_pembayaran'] = date('Y-m-d');

		
		ppob::create($dt);
    	return Redirect::back()->withSuccess($pulsa->message);
    }

    public function proses_pln(Request $request) {
    	$code = $request->code;
    	$nomor = $request->nomor;
    	$custnomor = $request->custnomor;
    	$id = 'TRX'.$code.date('Ymd').rand(0000,9999);
    	$harga = Pulsa::cekHarga($code)->message[0]->price;
    	$pulsa = Pulsa::prosesPLN($code, $nomor, $custnomor, $id);
    	$datas['id_user'] = Auth::user()->id;
		$datas['title'] = 'Pembayaran '.$id;
		$jam = date('H:i');
		$date = date('d-m-Y');
		$datas['info'] = $pulsa->message;
		$datas['jam'] = $jam;
		$datas['tanggal'] = $date;


		$dt['id_user'] = Auth::user()->id;
		$dt['id_pulsa'] = $id;
		$dt['jumlah_pembayaran'] = $harga;
		$dt['tgl_pembayaran'] = date('Y-m-d');

		
		ppob::create($dt);


		history::create($datas);
    	return Redirect::back()->withSuccess($pulsa->message);
    }


    public function gojek() {
    	$pulsa = Pulsa::cekHarga('GJ')->message;
    	$name = 'Saldo gojek';
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }


    public function grab() {
    	$pulsa = Pulsa::cekHarga('GB')->message;

    	$name = 'Saldo Grab';
    	return view('umum.bayar-bayar.pulsa', compact('pulsa','name'));
    }
}
