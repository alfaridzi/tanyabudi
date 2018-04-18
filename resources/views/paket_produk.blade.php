@extends('user.layout.app-3')
@section('page-title', 'Paket Produk')
@section('content')
<div class="detail-paket">
	<div class="container">
		<div class="row">
			<p>Paket Produk Agen (Auto Sesuai Pilihan Awal)</p>
			<hr>
			<p>Harga</p>
			<hr>
			<p>Deskripsi : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="center-align">
			<a href="{{ url('instruksi-bayar') }}" class="btn-konfirmasi">Pembayaran</a>
		</div>
	</div>
</div>
@endsection