@extends('user.layout.app-1')
@section('page-title', 'Notifikasi')
@push('css')
<style type="text/css">
	body {
		background-color: #E2E2E2;
	}
</style>
@endpush
@section('content')
<div class="notifikasi">
	<div class="container-fluid">
		<div class="row">
			<div class="list-notifikasi">
				<div class="col s12 isi-notifikasi terbaca">
					<div class="judul-pesan">Judul Pesan 1</div>
					<div class="pesan">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</div>
					<div class="tanggal-pesan"><i class="fa fa-calendar" style="color: #2F0F62"></i> &nbsp;29 Okt 2018 - 12:02</div>
				</div>
				<div class="col s12 isi-notifikasi">
					<div class="judul-pesan">Judul Pesan 1</div>
					<div class="pesan">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</div>
					<div class="tanggal-pesan"><i class="fa fa-calendar" style="color: #2F0F62"></i> &nbsp;29 Okt 2018 - 12:02</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection