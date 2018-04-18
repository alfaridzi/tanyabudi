@extends('user.layout.app-1')
@section('page-title', 'Detail Paket')
@section('content')
<div class="detail-paket">
	<div class="container">
		<div class="row">
			<p>Nama Paket</p>
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
			<a href="{{ url('konfirmasi') }}" class="btn-konfirmasi">Beli Paket</a>
		</div>
	</div>
</div>
@endsection