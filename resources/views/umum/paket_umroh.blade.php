@extends('user.layout.app')
@section('page-title', 'Paket Umroh')
@section('content')
<div class="page-break">
	Paket Umroh
</div>
<div class="container">
	<div class="row">
		<div class="daftar-paket">
			<ol>
				<?php
				$umroh = App\produk::where('type',2)->get();
				?>

				@foreach($umroh as $item)
				<li>
					<a href="{{ url('detail-paket/'.$item->id) }}">
						<div class="overlay"></div>
						<div class="detail-paket">
							<div class="nama-travel">Nama Travel</div>
							<div class="nama-paket">{{ $item->nama }}</div>
							<div class="harga-paket">Rp. {{ number_format($item->harga,0,'.','.') }}</div>
						</div>
						<div class="cover-img">
							<img src="{{ asset('assets/images/paket/umroh/'.$item->gambar) }}">
						</div>
					</a>
				</li>
				@endforeach
			</ol>
		</div>
	</div>
</div>
@endsection