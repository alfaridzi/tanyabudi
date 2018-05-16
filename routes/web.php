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



Route::post('update/transaction', function() {
	if($_SERVER['REMOTE_ADDR']=='172.104.161.223'){ 
		file_put_contents('save.txt', $_POST['content']);
	}
});

Route::post('paket/upload/{id}','API\RegisterController@uploadtf');

Route::post('api/register', 'API\RegisterController@register');
Route::get('register/{token}','API\RegisterController@activating')->name('activating-account');

Route::get('upload/{token}','API\RegisterController@upload')->name('upload-tf');

	Route::get('/logout','Auth\LoginController@logout');

Route::middleware('admin')->group(function(){
	Route::get('index/login', 'Admin\LoginController@index');
	Route::post('index/admin', 'Admin\LoginController@login');
});

Route::middleware(['auth:admin'])->prefix('index/admin')->group(function(){


	Route::get('dashboard', 'Admin\DashboardController@index');

	Route::get('ajax/dashboard_notif/{tipe}', 'Admin\AjaxController@dashboard_notif');
	Route::get('ajax/dashboard_chart', 'Admin\AjaxController@dashboard_chart');
	Route::get('ajax/dashboard_transaksi', 'Admin\AjaxController@dashboard_transaksi');
	Route::get('ajax/dashboard_user', 'Admin\AjaxController@dashboard_user');
	Route::get('ajax/get_jabatan/{kode_divisi}', 'Admin\AjaxController@get_jabatan');
	Route::get('ajax/get_kota/{province_id}', 'Admin\AjaxController@get_kota');
	Route::get('ajax/get_kecamatan/{regency_id}', 'Admin\AjaxController@get_kecamatan');
	Route::get('ajax/get_kelurahan/{district_id}', 'Admin\AjaxController@get_kelurahan');
	Route::get('ajax/get_produk/{tipe_produk}', 'Admin\AjaxController@get_produk');
	Route::get('ajax/get_user/{tipe_produk}', 'Admin\AjaxController@get_user');
	Route::get('ajax/detail_karyawan/{id_karyawan}', 'Admin\AjaxController@detail_karyawan');
	Route::get('ajax/get_transaksi/{keyword}', 'Admin\AjaxController@get_transaksi');
	Route::get('ajax/get_sisa_tagihan/{id_user}', 'Admin\AjaxController@get_sisa_tagihan');

	Route::post('transaksi/konfirmasi/{id}', 'Admin\TransaksiController@konfirm')->middleware(['permission:konfirmasi transaksi']);

	Route::get('transaksi/haji', 'Admin\TransaksiController@haji');
	Route::post('transaksi/haji/konfirmasi/{id}', 'Admin\TransaksiController@konfirm')->middleware(['permission:konfirmasi transaksi']);
	Route::get('transaksi/haji/search', 'Admin\TransaksiController@search');

	Route::get('transaksi/umroh', 'Admin\TransaksiController@umroh');
	Route::post('transaksi/umroh/konfirmasi/{id}', 'Admin\TransaksiController@konfirm')->middleware(['permission:konfirmasi transaksi']);
	Route::get('transaksi/umroh/search', 'Admin\TransaksiController@search');

	Route::get('transaksi/wisata', 'Admin\TransaksiController@wisata');
	Route::post('transaksi/wisata/konfirmasi/{id}', 'Admin\TransaksiController@konfirm')->middleware(['permission:konfirmasi transaksi']);
	Route::get('transaksi/wisata/search', 'Admin\TransaksiController@search');

	Route::get('transaksi/sedekah', 'Admin\TransaksiController@sedekah');
	Route::post('transaksi/sedekah/konfirmasi/{id}', 'Admin\TransaksiController@konfirm')->middleware(['permission:konfirmasi transaksi']);
	Route::get('transaksi/sedekah/search', 'Admin\TransaksiController@search');

	Route::get('transaksi/bayar-paket', 'Admin\TransaksiController@bayar_paket');
	Route::post('transaksi/bayar-paket/konfirmasi/{id}', 'Admin\TransaksiController@konfirm_paket')->middleware(['permission:konfirmasi transaksi']);
	Route::get('transaksi/bayar-paket/search', 'Admin\TransaksiController@search');

	Route::get('transaksi/top-up', 'Admin\TransaksiController@top_up');
	Route::post('transaksi/top-up/konfirmasi/{id}', 'Admin\TransaksiController@konfirm_topup')->middleware(['permission:konfirmasi transaksi']);
	Route::get('transaksi/top-up/search', 'Admin\TransaksiController@search');

	Route::get('transaksi/konfirmasi-user', 'Admin\TransaksiController@user');
	Route::post('transaksi/konfirmasi-user/konfirmasi/{id}', 'Admin\TransaksiController@konfirm_user')->middleware(['permission:konfirmasi transaksi']);
	Route::get('transaksi/konfirmasi-user/search', 'Admin\TransaksiController@search');
	
	Route::get('transaksi/ppob', 'Admin\TransaksiController@ppob');
	Route::get('transaksi/ppob/search', 'Admin\TransaksiController@search_ppob');

	Route::get('kwitansi', 'Admin\KwitansiController@index');
	Route::get('kwitansi/buat-transaksi', 'Admin\KwitansiController@buat_transaksi')->middleware(['permission:buat transaksi']);
	Route::post('kwitansi/buat-transaksi/simpan', 'Admin\KwitansiController@store_transaksi');
	Route::post('kwitansi/status/{id_kwitansi}', 'Admin\KwitansiController@ubah_status')->middleware(['permission:ubah status kwitansi']);

	Route::get('produk/tambah', 'Admin\ProdukController@create')->middleware(['permission:tambah produk']);
	Route::post('produk/tambah/simpan', 'Admin\ProdukController@store');
	Route::get('produk/{produk}', 'Admin\ProdukController@index');
	Route::get('produk/{produk}/search', 'Admin\ProdukController@search');
	Route::get('produk/edit/{id_produk}', 'Admin\ProdukController@edit')->middleware(['permission:edit produk']);
	Route::patch('produk/update/{id_produk}', 'Admin\ProdukController@update');
	Route::delete('produk/delete/{id_produk}', 'Admin\ProdukController@delete')->middleware(['permission:delete produk']);

	Route::get('paket', 'Admin\PaketController@index');
	Route::get('paket/search', 'Admin\PaketController@search');
	Route::get('paket/tambah', 'Admin\PaketController@create')->middleware(['permission:tambah paket haji umroh']);
	Route::post('paket/tambah/simpan', 'Admin\PaketController@store');
	Route::get('paket/edit/{id_produk}', 'Admin\PaketController@edit')->middleware(['permission:edit paket haji umroh']);;
	Route::patch('paket/update/{id_produk}', 'Admin\PaketController@update');
	Route::delete('paket/delete/{id_produk}', 'Admin\PaketController@delete')->middleware(['permission:delete paket haji umroh']);;
	Route::get('paket/status/{id_produk}', 'Admin\PaketController@status')->middleware(['permission:status paket haji umroh']);;

	Route::get('voucher', 'Admin\VoucherController@index');
	Route::get('voucher/search', 'Admin\VoucherController@search');
	Route::get('voucher/tambah', 'Admin\VoucherController@create')->middleware(['permission:tambah voucher']);
	Route::post('voucher/tambah/simpan', 'Admin\VoucherController@store');
	Route::get('voucher/edit/{id_voucher}', 'Admin\VoucherController@edit')->middleware(['permission:edit voucher']);
	Route::patch('voucher/update/{id_voucher}', 'Admin\VoucherController@update');
	Route::delete('voucher/delete/{id_voucher}', 'Admin\VoucherController@delete')->middleware(['permission:delete voucher']);

	Route::get('data-user/agen', 'Admin\DataUserController@index_agen');
	Route::post('data-user/agen/ubah-status/{id_user}', 'Admin\DataUserController@ubah_status')->middleware(['permission:ubah status user']);
	Route::get('data-user/agen/search', 'Admin\DataUserController@search_agen');
	Route::get('data-user/agen/{id_agen}/list-transaksi', 'Admin\DataUserController@list_trx_agen');
	Route::get('data-user/agen/{id_agen}/list-transaksi/search', 'Admin\DataUserController@search_transaksi');

	Route::get('data-user/user', 'Admin\DataUserController@index_user');
	Route::post('data-user/user/ubah-status/{id_user}', 'Admin\DataUserController@ubah_status')->middleware(['permission:ubah status user']);
	Route::get('data-user/user/search', 'Admin\DataUserController@search_user');

	Route::get('data-booking/jamaah', 'Admin\JamaahController@index');
	Route::get('data-booking/jamaah/search', 'Admin\JamaahController@search');
	Route::get('data-booking/jamaah/tambah', 'Admin\JamaahController@create')->middleware(['permission:tambah jamaah']);
	Route::post('data-booking/jamaah/tambah/simpan', 'Admin\JamaahController@store');
	Route::get('data-booking/jamaah/edit/{id_jamaah}', 'Admin\JamaahController@edit')->middleware(['permission:edit jamaah']);
	Route::patch('data-booking/jamaah/update/{id_jamaah}', 'Admin\JamaahController@update');
	Route::delete('data-booking/jamaah/delete/{id_jamaah}', 'Admin\JamaahController@delete')->middleware(['permission:delete jamaah']);

	Route::get('data-booking/booking', 'Admin\BookingController@index');
	Route::get('data-booking/booking/search', 'Admin\BookingController@search');
	Route::get('data-booking/booking/edit/{id_booking}', 'Admin\BookingController@edit')->middleware(['permission:edit booking']);
	Route::patch('data-booking/booking/update/{id_booking}', 'Admin\BookingController@update');
	Route::get('data-booking/booking/print-voucher/{id_booking}', 'Admin\BookingController@print')->middleware(['permission:print voucher']);

	Route::get('data-booking/paspor/edit/{id_paspor}', 'Admin\PasporController@edit')->middleware(['permission:edit paspor']);
	Route::patch('data-booking/paspor/update/{id_paspor}', 'Admin\PasporController@update');

	Route::get('data-kloter/kloter', 'Admin\KloterController@index');
	Route::get('data-kloter/kloter/search', 'Admin\KloterController@search');
	Route::get('data-kloter/kloter/tambah', 'Admin\KloterController@create')->middleware(['permission:tambah kloter']);
	Route::post('data-kloter/kloter/tambah/simpan', 'Admin\KloterController@store');
	Route::get('data-kloter/kloter/edit/{id_kloter}', 'Admin\KloterController@edit')->middleware(['permission:edit kloter']);
	Route::patch('data-kloter/kloter/update/{id_kloter}', 'Admin\KloterController@update');
	Route::delete('data-kloter/kloter/delete/{id_kloter}', 'Admin\KloterController@delete')->middleware(['permission:delete kloter']);

	Route::get('data-kloter/kloter/list-jamaah/{id_kloter}', 'Admin\KloterController@list_jamaah');
	Route::get('data-kloter/kloter/list-jamaah/{id_kloter}/tambah', 'Admin\KloterController@isi_kuota')->middleware(['permission:isi kuota']);
	Route::post('data-kloter/kloter/list-jamaah/{id_kloter}/tambah/simpan', 'Admin\KloterController@store_isi_kuota');
	Route::delete('data-kloter/kloter/list-jamaah/{id_kloter}/delete', 'Admin\KloterController@delete_kuota')->middleware(['permission:delete kuota']);

	Route::get('data-kloter/bus', 'Admin\BusController@index');
	Route::get('data-kloter/bus/search', 'Admin\BusController@search');
	Route::get('data-kloter/bus/tambah', 'Admin\BusController@create')->middleware(['permission:tambah bus']);
	Route::post('data-kloter/bus/tambah/simpan', 'Admin\BusController@store');
	Route::get('data-kloter/bus/edit/{id_bus}', 'Admin\BusController@edit')->middleware(['permission:edit bus']);
	Route::patch('data-kloter/bus/update/{id_bus}', 'Admin\BusController@update');
	Route::delete('data-kloter/bus/delete/{id_bus}', 'Admin\BusController@delete')->middleware(['permission:delete bus']);

	Route::get('data-kloter/bus/list-jamaah/{id_bus}', 'Admin\BusController@list_jamaah');
	Route::get('data-kloter/bus/list-jamaah/{id_bus}/tambah', 'Admin\BusController@isi_kuota')->middleware(['permission:isi kuota']);
	Route::post('data-kloter/bus/list-jamaah/{id_bus}/tambah/simpan', 'Admin\BusController@store_isi_kuota');
	Route::delete('data-kloter/bus/list-jamaah/{id_bus}/delete', 'Admin\BusController@delete_kuota')->middleware(['permission:delete kuota']);

	Route::get('data-kloter/kamar', 'Admin\KamarController@index');
	Route::get('data-kloter/kamar/search', 'Admin\KamarController@search');
	Route::get('data-kloter/kamar/tambah', 'Admin\KamarController@create')->middleware(['permission:tambah kamar']);
	Route::post('data-kloter/kamar/tambah/simpan', 'Admin\KamarController@store');
	Route::get('data-kloter/kamar/edit/{id_kamar}', 'Admin\KamarController@edit')->middleware(['permission:edit kamar']);
	Route::patch('data-kloter/kamar/update/{id_kamar}', 'Admin\KamarController@update');
	Route::delete('data-kloter/kamar/delete/{id_kamar}', 'Admin\KamarController@delete')->middleware(['permission:delete kamar']);

	Route::get('data-kloter/kamar/list-jamaah/{id_kamar}', 'Admin\KamarController@list_jamaah');
	Route::get('data-kloter/kamar/list-jamaah/{id_kamar}/tambah', 'Admin\KamarController@isi_kuota')->middleware(['permission:isi kuota']);
	Route::post('data-kloter/kamar/list-jamaah/{id_kamar}/tambah/simpan', 'Admin\KamarController@store_isi_kuota');
	Route::delete('data-kloter/kamar/list-jamaah/{id_kamar}/delete', 'Admin\KamarController@delete_kuota')->middleware(['permission:delete kuota']);

	Route::get('karyawan', 'Admin\KaryawanController@index');
	Route::get('karyawan/tambah', 'Admin\KaryawanController@create')->middleware(['permission:tambah karyawan']);
	Route::post('karyawan/tambah/simpan', 'Admin\KaryawanController@store');
	Route::get('karyawan/edit/{id_karyawan}', 'Admin\KaryawanController@edit')->middleware(['permission:edit karyawan']);
	Route::patch('karyawan/update/{id_karyawan}', 'Admin\KaryawanController@update');
	Route::delete('karyawan/delete/{id_karyawan}', 'Admin\KaryawanController@delete')->middleware(['permission:delete karyawan']);

	Route::get('divisi', 'Admin\DivisiController@index');
	Route::get('divisi/tambah', 'Admin\DivisiController@create')->middleware(['permission:tambah divisi']);
	Route::post('divisi/tambah/simpan', 'Admin\DivisiController@store');
	Route::get('divisi/edit/{kode_divisi}', 'Admin\DivisiController@edit')->middleware(['permission:edit divisi']);
	Route::patch('divisi/update/{kode_divisi}', 'Admin\DivisiController@update');
	Route::delete('divisi/delete/{kode_divisi}', 'Admin\DivisiController@delete')->middleware(['permission:delete divisi']);

	Route::get('jabatan', 'Admin\JabatanController@index');
	Route::get('jabatan/tambah', 'Admin\JabatanController@create')->middleware(['permission:tambah jabatan']);
	Route::post('jabatan/tambah/simpan', 'Admin\JabatanController@store');
	Route::get('jabatan/edit/{kode_jabatan}', 'Admin\JabatanController@edit')->middleware(['permission:edit jabatan']);
	Route::patch('jabatan/update/{kode_jabatan}', 'Admin\JabatanController@update');
	Route::delete('jabatan/delete/{kode_jabatan}', 'Admin\JabatanController@delete')->middleware(['permission:delete jabatan']);

	Route::get('report-admin', 'Admin\LogController@index');
	Route::get('report-admin/rincian-log/{id_admin}', 'Admin\LogController@rincian');

	Route::get('kas', 'Admin\KasController@index');
	Route::get('kas/search', 'Admin\KasController@search');
	Route::get('kas/tambah', 'Admin\KasController@create')->middleware(['permission:tambah kas']);
	Route::post('kas/tambah/simpan', 'Admin\KasController@store');
	Route::get('kas/edit/{id_kas}', 'Admin\KasController@edit')->middleware(['permission:edit kas']);
	Route::patch('kas/update/{id_kas}', 'Admin\KasController@update');
	Route::delete('kas/delete/{id_kas}', 'Admin\KasController@delete')->middleware(['permission:delete kas']);


	Route::get('user', 'Admin\AdminController@index');
	Route::get('user/{id_karyawan}/tambah', 'Admin\AdminController@create')->middleware(['permission:tambah admin']);
	Route::post('user/{id_karyawan}/tambah/simpan', 'Admin\AdminController@store');
	Route::get('user/edit/{id_admin}', 'Admin\AdminController@edit')->middleware(['permission:edit admin']);
	Route::patch('user/update/{id_admin}', 'Admin\AdminController@update');
	Route::delete('user/delete/{id_admin}', 'Admin\AdminController@delete')->middleware(['permission:delete admin']);

	Route::get('role', 'Admin\RoleController@index');
	Route::get('role/tambah', 'Admin\RoleController@create')->middleware(['permission:tambah role']);
	Route::post('role/tambah/simpan', 'Admin\RoleController@store');
	Route::get('role/edit/{id_role}', 'Admin\RoleController@edit')->middleware(['permission:edit role']);
	Route::patch('role/update/{id_role}', 'Admin\RoleController@update');
	Route::delete('role/delete/{id_role}', 'Admin\RoleController@delete')->middleware(['permission:delete role']);

	Route::get('permission', 'Admin\PermissionController@index');
	Route::get('permission/tambah', 'Admin\PermissionController@create')->middleware(['permission:tambah permission']);
	Route::post('permission/tambah/simpan', 'Admin\PermissionController@store');
	Route::delete('permission/delete/{id_permission}', 'Admin\PermissionController@delete')->middleware(['permission:delete permission']);

	Route::get('pengaturan/edit-halaman-bantuan', 'Admin\PengaturanController@edit_bantuan')->middleware(['permission:menu edit bantuan']);
	Route::patch('pengaturan/edit-halaman-bantuan/update', 'Admin\PengaturanController@update_bantuan');

	Route::get('pengaturan/informasi', 'Admin\InformasiController@index');
	Route::get('pengaturan/informasi/tambah', 'Admin\InformasiController@create')->middleware(['permission:tambah informasi']);
	Route::post('pengaturan/informasi/tambah/simpan', 'Admin\InformasiController@store');
	Route::get('pengaturan/informasi/edit/{id_informasi}', 'Admin\InformasiController@edit')->middleware(['permission:edit informasi']);
	Route::patch('pengaturan/informasi/update/{id_informasi}', 'Admin\InformasiController@update');
	Route::delete('pengaturan/informasi/delete/{id_informasi}', 'Admin\InformasiController@delete')->middleware(['permission:delete informasi']);

	Route::get('pengaturan/user', 'Admin\PengaturanController@user');
	Route::patch('pengaturan/user/update', 'Admin\PengaturanController@user_update');

	Route::post('logout', 'Admin\LoginController@logout');
});



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

	Route::get('/syarat-ketentuan-agen', function(){
		return view('agen.syarat_ketentuan');
	});

});

Route::group(['middleware'=>'auth'], function() {
       Route::get('/instruksi-bayar', function(){
			return view('instruksi');
		});

Route::get('index/voucher/{kode_voucher}', 'RedeemVoucherController@redeemVoucher');

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


Route::get('/pengaturan', 'ProfileController@edit');
Route::patch('pengaturan/update', 'ProfileController@update');

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

Route::get('/bayar-bayar', 'pulsaController@index');

Route::get('/history', function(){
	return view('user.history');
});

Route::get('/dashboard-agen', function(){
	return view('agen.index');
});

Route::get('/list-referral','referalController@list');

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
Route::get('/pembayaran/pln', 'pulsaController@pln');
Route::get('/pembayaran/telkom', function(){
	return view('umum.bayar-bayar.telkom');
});


Route::get('/pembelian/pulsa/tri', 'PulsaController@tri');
Route::get('/pembelian/pulsa/telkomsel', 'PulsaController@telkomsel');
Route::get('/pembelian/pulsa/indosat', 'PulsaController@indosat');
Route::get('/pembelian/pulsa/smartfren', 'PulsaController@smartfren');
Route::get('/pembelian/pulsa/xl', 'PulsaController@xl');
Route::get('/pembelian/pulsa/axis', 'PulsaController@axis');

Route::get('/pembelian/grab', 'PulsaController@grab');
Route::get('/pembelian/gojek', 'PulsaController@gojek');
Route::get('/pembelian/pln', 'PulsaController@pln');
Route::post('/pulsa/proses', 'PulsaController@proses');
Route::post('/pln/proses', 'PulsaController@proses_pln');

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

Route::get('topup', function() {
return view('topup.instruksi');
});

Route::get('topup/konfirmasi', function() {
return view('topup.konfirmasi');
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




