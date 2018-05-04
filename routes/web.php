<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware'=>'guest'], function() {
Route::get('test', function() {
	 dd(Session::all());
	});
});
Route::post('api/register', 'API\RegisterController@register');
Route::get('register/{token}','API\RegisterController@activating')->name('activating-account');


	Route::get('/logout','Auth\LoginController@logout');
Route::group(['middleware'=>['guest','web']], function() {



	Route::get('/', function(){
		return view('index');
	})->name('login');

	//Bagian Register dan Login 
	Route::get('/register', function(){
		return view('register');
	});


	Route::post('/login','Auth\LoginController@login');


	Route::get('/syarat-ketentuan', function(){
		return view('syarat_ketentuan');
	});

});
Route::group(['middleware'=>'auth'], function() {
       Route::get('/instruksi-bayar', function(){
	return view('instruksi');
});

Route::get('scan', function() {
	return view('scan');
});

Route::get('/detail-paket/{id}', 'produkController@detail_produk');

Route::get('/daftar-konfirmasi-pembayaran', function(){
	return view('konfirmasi_pembayaran');
});

Route::get('/pendaftaran-berhasil', function(){
	return view('pendaftaran_berhasil');
});
// Akhir Bagian Register dan Login

Route::get('/dashboard', 'dashboardController@index');

Route::get('/notifikasi', function(){
	return view('umum.notifikasi');
});

Route::get('/pengaturan', function(){
	return view('umum.pengaturan');
});

Route::get('/tabungan-haji-umroh', function(){
	return view('agen.tabungan_haji_umroh');
});

Route::get('/total-bonus', function(){
	return view('agen.total_bonus');
});

Route::get('/bayar-bayar', function() {
	return view('umum.bayar_bayar');
});

Route::get('/history', function(){
	return view('user.history');
});

Route::get('/dashboard-agen', function(){
	return view('agen.index');
});

Route::get('/list-referral', function(){
	return view('agen.list_referral');
});

Route::get('list-voucher', function() {
	return view('agen.list_voucher');
});

Route::get('/haji-umroh', function(){
	return view('umum.haji_umroh');
});

Route::get('/paket-haji', function(){
	return view('umum.paket_haji');
});

Route::get('/paket-umroh', function(){
	return view('umum.paket_umroh');
});

Route::get('/sedekah', function(){
	return view('umum.sedekah');
});

Route::get('/pembayaran/bpjs', function(){
	return view('umum.bayar-bayar.bpjs');
});

Route::get('/pembayaran/pdam', function(){
	return view('umum.bayar-bayar.pdam');
});

Route::get('/pembayaran/pln', function(){
	return view('umum.bayar-bayar.pln');
});

Route::get('/pembayaran/telkom', function(){
	return view('umum.bayar-bayar.telkom');
});

Route::get('/pembelian/pulsa', function(){
	return view('umum.bayar-bayar.pulsa');
});

Route::get('/berhasil', function(){
	return view('umum.pemberitahuan_berhasil');
});

Route::get('/paket-wisata', function(){
	return view('umum.paket_wisata');
});

Route::get('/detail-paket', function(){
	return view('umum.detail_paket');
});

Route::get('/instruksi', function() {
	return view('umum.instruksi');
});
Route::get('/konfirmasi', function() {
	return view('umum.konfirmasi');
});
Route::get('/konfirmasi/{id}', 'produkController@konfirmasi');
Route::post('/konfirmasi/{id}', 'produkController@konfirmasi_wisata');
Route::get('/intruksi/{id}', 'produkController@intruksi');
Route::post('/intruksi/{id}', 'produkController@intruksi_wisata');
Route::post('/selesai/{id}', 'produkController@selesai');
Route::post('sedekah/konfirmasi', 'produkController@konfirmasi_sedekah');
});