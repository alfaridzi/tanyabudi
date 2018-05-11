@extends('user.layout.app-1')
@section('page-title', 'Pembelian '.$name)
@section('content')
<div class="container">
	<div class="row">
		<h5>PEMBELIAN {{ $name }}</h5>
		<form method="post" action="{{ url('pulsa/proses') }}">
			@csrf
			@if(Session::has('success'))
			<div class="card green darken-1">
						   <div class="row">
						    <div class="col s12 m10">
						      <div class="card-content white-text">
						      	<p>{{ Session::get('success') }}</p>
												</div>
						  </div>
						  
						  </div>
						  </div>
			@endif
			<div class="row">
				<div class="input-field col s12">
					<input type="text" class="validate" name="nomor" placeholder="No. Handphone">
				</div>
				<div class="input-field col s12">
					<select name="code">

						@foreach($pulsa as $item)
						<option value="{{ $item->code}}">{{ $item->description }} - Rp. {{ number_format($item->price,0,'.','.') }}</option>
						@endforeach
					</select>
				</div>
				<div class="col s12 center-align">
					<button type="submit" class="btn-konfirmasi">Bayar Tagihan</button>
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