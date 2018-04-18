@extends('user.layout.app-1')
@section('page-title', 'Pembayaran PDAM')
@section('content')
<div class="container">
	<div class="row">
		<h5>PDAM</h5>
		<form method="post">
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<select>
						<option disabled="" selected="">Pilih Daerah PDAM</option>
						<option>Jakarta Selatan</option>
						<option>Bekasi Timur</option>
					</select>
				</div>
				<div class="input-field col s12">
					<input type="text" class="validate" name="id_pelanggan" placeholder="ID Pelanggan">
				</div>
				<div class="input-field col s12">
					<input type="text" class="validate" name="nama_pelanggan" placeholder="Nama Pelanggan">
				</div>
				<div class="input-field col s12">
					<input type="text" class="validate" name="nomor_hp" placeholder="Nomor HP Pelanggan">
				</div>
				<div class="col s12 center-align">
					<a href="{{ url('berhasil') }}" class="btn-konfirmasi">Bayar Tagihan</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function(){
	$('select').formSelect();
});
</script>
@endpush