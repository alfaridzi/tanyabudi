@extends('user.layout.app-1')
@section('page-title', 'Pembayaran PLN')
@section('content')
<div class="container">
	<div class="row">
		<h5>PLN</h5>
		<form method="post">
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<input type="text" class="validate" name="nomor_listrik" placeholder="Nomor Meter / ID Pelanggan">
				</div>
				<div class="input-field col s12">
					<select>
						<option disabled="" selected="">Nominal</option>
						<option>Token PLN 10.000</option>
						<option>Token PLN 30.000</option>
						<option>Token PLN 50.000</option>
						<option>Token PLN 100.000</option>
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