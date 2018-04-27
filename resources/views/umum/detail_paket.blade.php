@extends('user.layout.app-1')
@section('page-title', 'Detail Paket')
@section('content')
<div class="detail-paket">
	<div class="container">
		<div class="row">


			<form  method="post" action="/intruksi/{{$produk->id}}">
			@csrf
			<p>{{ $produk->nama }}</p>
			
			
			@if($produk->type == 3)
			<div class="input-field">
				<select class="browser-default" name="jumlah_orang" id="jumlah_orang">
					<option value="" disabled selected>Jumlah orang</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>

			</select>
		</div>
			@endif
			
			<p id="harga_final">Rp. {{ number_format($produk->harga,0,'.','.') }}</p>
			<input type="hidden" id="harga" value="{{$produk->harga}}">
			<input type="hidden" id="jumlah_harga" name="jumlah_harga" value="{{$produk->harga}}">
			<hr>
			<p>Deskripsi : {{ $produk->desc_prod }}</p>
		</div>
		<div class="center-align">
			<button type="submit" class="btn-konfirmasi">Beli Paket</button>
		</div>
		</form>
	</div>
</div>



@endsection


@push('js')


<script>
	

	$('#jumlah_orang').change(function() {
		var f_harga = $('#harga').val() * $('#jumlah_orang').val();
		document.getElementsByName('jumlah_harga')[0].value = f_harga;
		$('#harga_final').text('Rp. ' + f_harga.toLocaleString());
		
	});
</script>

@endpush


