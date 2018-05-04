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
Route::get('index/login', function(){
	return view('admin.login');
});

Route::prefix('index/admin')->group(function(){

	Route::get('dashboard', function(){
		return view('admin.dashboard');
	});

	Route::get('ajax/get_jabatan/{kode_divisi}', 'Admin\AjaxController@get_jabatan');
	Route::get('ajax/get_kota/{province_id}', 'Admin\AjaxController@get_kota');
	Route::get('ajax/get_kecamatan/{regency_id}', 'Admin\AjaxController@get_kecamatan');
	Route::get('ajax/get_kelurahan/{district_id}', 'Admin\AjaxController@get_kelurahan');
	Route::get('ajax/detail_karyawan/{id_karyawan}', 'Admin\AjaxController@detail_karyawan');

	Route::get('transaksi/haji', 'Admin\TransaksiController@haji');
	Route::post('transaksi/haji/konfirmasi/{id}', 'Admin\TransaksiController@konfirm_haji');

	Route::get('produk/tambah', 'Admin\ProdukController@create');
	Route::post('produk/tambah/simpan', 'Admin\ProdukController@store');
	Route::get('produk/{produk}', 'Admin\ProdukController@index');
	Route::get('produk/{produk}/search', 'Admin\ProdukController@search');
	Route::get('produk/edit/{id_produk}', 'Admin\ProdukController@edit');
	Route::patch('produk/update/{id_produk}', 'Admin\ProdukController@update');
	Route::delete('produk/delete/{id_produk}', 'Admin\ProdukController@delete');

	Route::get('paket', 'Admin\PaketController@index');
	Route::get('paket/tambah', 'Admin\PaketController@create');
	Route::post('paket/tambah/simpan', 'Admin\PaketController@store');
	Route::get('paket/edit/{id_produk}', 'Admin\PaketController@edit');
	Route::patch('paket/update/{id_produk}', 'Admin\PaketController@update');
	Route::delete('paket/delete/{id_produk}', 'Admin\PaketController@delete');
	Route::get('paket/status/{id_produk}', 'Admin\PaketController@status');

	Route::get('voucher', 'Admin\VoucherController@index');
	Route::get('voucher/search', 'Admin\VoucherController@search');
	Route::get('voucher/tambah', 'Admin\VoucherController@create');
	Route::post('voucher/tambah/simpan', 'Admin\VoucherController@store');
	Route::get('voucher/edit/{id_voucher}', 'Admin\VoucherController@edit');
	Route::patch('voucher/update/{id_voucher}', 'Admin\VoucherController@update');
	Route::get('voucher/print/{id_voucher}', 'Admin\VoucherController@print');
	Route::delete('voucher/delete/{id_voucher}', 'Admin\VoucherController@delete');

	Route::get('data-user/agen', 'Admin\DataUserController@index_agen');
	Route::post('data-user/agen/konfirmasi/{id}', 'Admin\DataUserController@konfirmasi');
	Route::get('data-user/agen/search', 'Admin\DataUserController@search_agen');

	Route::get('data-user/user', 'Admin\DataUserController@index_user');
	Route::post('data-user/user/konfirmasi/{id}', 'Admin\DataUserController@konfirmasi');
	Route::get('data-user/user/search', 'Admin\DataUserController@search_user');

	Route::get('data-booking/jamaah', 'Admin\JamaahController@index');
	Route::get('data-booking/jamaah/search', 'Admin\JamaahController@search');
	Route::get('data-booking/jamaah/tambah', 'Admin\JamaahController@create');
	Route::post('data-booking/jamaah/tambah/simpan', 'Admin\JamaahController@store');
	Route::get('data-booking/jamaah/edit/{id_jamaah}', 'Admin\JamaahController@edit');
	Route::patch('data-booking/jamaah/update/{id_jamaah}', 'Admin\JamaahController@update');
	Route::delete('data-booking/jamaah/delete/{id_jamaah}', 'Admin\JamaahController@delete');

	Route::get('data-booking/booking', 'Admin\BookingController@index');
	Route::get('data-booking/booking/search', 'Admin\BookingController@search');
	Route::get('data-booking/booking/edit/{id_booking}', 'Admin\BookingController@edit');
	Route::patch('data-booking/booking/update/{id_booking}', 'Admin\BookingController@update');

	Route::get('data-booking/paspor/edit/{id_paspor}', 'Admin\PasporController@edit');
	Route::patch('data-booking/paspor/update/{id_paspor}', 'Admin\PasporController@update');

	Route::get('data-kloter/kloter', 'Admin\KloterController@index');
	Route::get('data-kloter/kloter/search', 'Admin\KloterController@search');
	Route::get('data-kloter/kloter/tambah', 'Admin\KloterController@create');
	Route::post('data-kloter/kloter/tambah/simpan', 'Admin\KloterController@store');
	Route::get('data-kloter/kloter/edit/{id_kloter}', 'Admin\KloterController@edit');
	Route::patch('data-kloter/kloter/update/{id_kloter}', 'Admin\KloterController@update');
	Route::delete('data-kloter/kloter/delete/{id_kloter}', 'Admin\KloterController@delete');

	Route::get('data-kloter/kloter/list-jamaah/{id_kloter}', 'Admin\KloterController@list_jamaah');
	Route::get('data-kloter/kloter/list-jamaah/{id_kloter}/tambah', 'Admin\KloterController@isi_kuota');
	Route::post('data-kloter/kloter/list-jamaah/{id_kloter}/tambah/simpan', 'Admin\KloterController@store_isi_kuota');
	Route::delete('data-kloter/kloter/list-jamaah/{id_kloter}/delete', 'Admin\KloterController@delete_kuota');

	Route::get('data-kloter/bus', 'Admin\BusController@index');
	Route::get('data-kloter/bus/search', 'Admin\BusController@search');
	Route::get('data-kloter/bus/tambah', 'Admin\BusController@create');
	Route::post('data-kloter/bus/tambah/simpan', 'Admin\BusController@store');
	Route::get('data-kloter/bus/edit/{id_bus}', 'Admin\BusController@edit');
	Route::patch('data-kloter/bus/update/{id_bus}', 'Admin\BusController@update');
	Route::delete('data-kloter/bus/delete/{id_bus}', 'Admin\BusController@delete');

	Route::get('data-kloter/bus/list-jamaah/{id_bus}', 'Admin\BusController@list_jamaah');
	Route::get('data-kloter/bus/list-jamaah/{id_bus}/tambah', 'Admin\BusController@isi_kuota');
	Route::post('data-kloter/bus/list-jamaah/{id_bus}/tambah/simpan', 'Admin\BusController@store_isi_kuota');
	Route::delete('data-kloter/bus/list-jamaah/{id_bus}/delete', 'Admin\BusController@delete_kuota');

	Route::get('data-kloter/kamar', 'Admin\KamarController@index');
	Route::get('data-kloter/kamar/search', 'Admin\KamarController@search');
	Route::get('data-kloter/kamar/tambah', 'Admin\KamarController@create');
	Route::post('data-kloter/kamar/tambah/simpan', 'Admin\KamarController@store');
	Route::get('data-kloter/kamar/edit/{id_kamar}', 'Admin\KamarController@edit');
	Route::patch('data-kloter/kamar/update/{id_kamar}', 'Admin\KamarController@update');
	Route::delete('data-kloter/kamar/delete/{id_kamar}', 'Admin\KamarController@delete');

	Route::get('data-kloter/kamar/list-jamaah/{id_kamar}', 'Admin\KamarController@list_jamaah');
	Route::get('data-kloter/kamar/list-jamaah/{id_kamar}/tambah', 'Admin\KamarController@isi_kuota');
	Route::post('data-kloter/kamar/list-jamaah/{id_kamar}/tambah/simpan', 'Admin\KamarController@store_isi_kuota');
	Route::delete('data-kloter/kamar/list-jamaah/{id_kamar}/delete', 'Admin\KamarController@delete_kuota');

	Route::get('karyawan', 'Admin\KaryawanController@index');
	Route::get('karyawan/tambah', 'Admin\KaryawanController@create');
	Route::post('karyawan/tambah/simpan', 'Admin\KaryawanController@store');
	Route::get('karyawan/edit/{id_karyawan}', 'Admin\KaryawanController@edit');
	Route::patch('karyawan/update/{id_karyawan}', 'Admin\KaryawanController@update');
	Route::delete('karyawan/delete/{id_karyawan}', 'Admin\KaryawanController@delete');

	Route::get('divisi', 'Admin\DivisiController@index');
	Route::get('divisi/tambah', 'Admin\DivisiController@create');
	Route::post('divisi/tambah/simpan', 'Admin\DivisiController@store');
	Route::get('divisi/edit/{kode_divisi}', 'Admin\DivisiController@edit');
	Route::patch('divisi/update/{kode_divisi}', 'Admin\DivisiController@update');
	Route::delete('divisi/delete/{kode_divisi}', 'Admin\DivisiController@delete');

	Route::get('jabatan', 'Admin\JabatanController@index');
	Route::get('jabatan/tambah', 'Admin\JabatanController@create');
	Route::post('jabatan/tambah/simpan', 'Admin\JabatanController@store');
	Route::get('jabatan/edit/{kode_jabatan}', 'Admin\JabatanController@edit');
	Route::patch('jabatan/update/{kode_jabatan}', 'Admin\JabatanController@update');
	Route::delete('jabatan/delete/{kode_jabatan}', 'Admin\JabatanController@delete');

	Route::get('pengaturan/edit-halaman-bantuan', 'Admin\PengaturanController@edit_bantuan');
	Route::patch('pengaturan/edit-halaman-bantuan/update', 'Admin\PengaturanController@update_bantuan');
});


	Route::get('/logout','Auth\LoginController@logout');
Route::group(['middleware'=>'guest'], function() {



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

	Route::get('/syarat-ketentuan-agen', function(){
		return view('agen.syarat_ketentuan');
	});

});
Route::group(['middleware'=>'auth'], function() {
       Route::get('/instruksi-bayar', function(){
	return view('instruksi');
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

Route::get('/bantuan', function(){
	$bantuan = \DB::table('tbl_halaman_bantuan')->first();
	return view('umum.bantuan', compact('bantuan'));
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