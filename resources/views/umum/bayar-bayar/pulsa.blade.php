@extends('user.layout.app-1')
@section('page-title', 'Pembelian Pulsa')
@section('content')
<div class="container">
	<div class="row">
		<h5>Provider</h5>
		<form method="post">
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<input type="text" class="validate" name="nomor_hp" placeholder="No. Handphone">
				</div>
				<div class="input-field col s12">
					<select>
						<option disabled="" selected="">Nominal</option>
						<option>Rp 5.000</option>
						<option>Rp 10.000</option>
						<option>Rp 20.000</option>
						<option>Rp 50.000</option>
					</select>
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