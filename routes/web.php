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

Route::get('/', function(){
	return view('index');
});

Route::get('/register', function(){
	return view('register');
});

Route::get('/dashboard', function(){
	return view('user.index');
});

Route::get('/haji-umroh', function(){
	return view('user.haji_umroh');
});

Route::get('/paket-wisata', function(){
	return view('user.daftar_paket');
});

Route::get('/detail-paket', function(){
	return view('user.detail_paket');
});

Route::get('/instruksi', function() {
	return view('user.instruksi');
});

Route::get('/konfirmasi', function() {
	return view('user.konfirmasi_pembayaran');
});