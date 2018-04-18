@extends('user.layout.app')
@section('page-title', 'Paket Wisata')
@section('content')
<div class="page-break">
	Paket Wisata
</div>
<div class="container">
	<div class="row">
		<div class="daftar-paket">
			<ol>
				<li>
					<a href="{{ url('detail-paket') }}">
						<div class="overlay"></div>
						<div class="detail-paket">
							<div class="nama-travel">Nama Travel</div>
							<div class="nama-paket">Paket Wisata 9 Hari</div>
							<div class="harga-paket">Rp. 20.500.000</div>
						</div>
						<div class="cover-img">
							<img src="{{ asset('assets/images/paket/wisata/wisata-1.jpg') }}">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="overlay"></div>
						<div class="detail-paket">
							<div class="nama-travel">Nama Travel</div>
							<div class="nama-paket">Paket Wisata 9 Hari</div>
							<div class="harga-paket">Rp. 20.500.000</div>
						</div>
						<div class="cover-img">
							<img src="{{ asset('assets/images/paket/wisata/wisata-1.jpg') }}">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="overlay"></div>
						<div class="detail-paket">
							<div class="nama-travel">Nama Travel</div>
							<div class="nama-paket">Paket Wisata 9 Hari</div>
							<div class="harga-paket">Rp. 20.500.000</div>
						</div>
						<div class="cover-img">
							<img src="{{ asset('assets/images/paket/wisata/wisata-1.jpg') }}">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="overlay"></div>
						<div class="detail-paket">
							<div class="nama-travel">Nama Travel</div>
							<div class="nama-paket">Paket Wisata 9 Hari</div>
							<div class="harga-paket">Rp. 20.500.000</div>
						</div>
						<div class="cover-img">
							<img src="{{ asset('assets/images/paket/wisata/wisata-1.jpg') }}">
						</div>
					</a>
				</li>
			</ol>
		</div>
	</div>
</div>
@endsection