@extends('user.layout.app-1')
@section('page-title', 'Pembayaran BPJS')
@section('content')
<div class="container">
	<div class="row">
		<h5>BPJS</h5>
		<form method="post">
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<input type="text" class="validate" name="nomor_va" placeholder="Nama VA Pelanggan">
				</div>
				<div class="input-field col s12">
					<select>
						<option disabled="" selected="">Bayar Hingga</option>
						<option>Maret 2018</option>
						<option>April 2018</option>
						<option>Mei 2018</option>
						<option>Juni 2018</option>
						<option>July 2018</option>
					</select>
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