@extends('user.layout.app-1')
@section('page-title', 'Tabungan Haji/Umroh')
@section('content')

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="steps">
				<ol class="circle-steps">
					<li class="done">
						<i class="icon icon-pendaftaran"></i>
						<span>Pendaftaran</span>
					</li>
					<li class="done">
						<i class="icon icon-pelunasan"></i>
						<span>Pelunasan</span>
					</li>
					<li>
						<i class="icon icon-pesawat"></i>
						<span>Keberangkatan</span>
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="user-content">
		<div class="row valign-wrapper row-1">
			<div class="col s12">
				<div class="img-user">
					<img src="{{ asset('assets/images/user-1.png') }}" class="circle responsive-img" width="110" height="110">
					<div class="center-align nama-user">
						<span>Rika Sartika</span>
					</div>
				</div>
				<div class="tabungan-haji">
					<span class="title-produk">Jumlah Tabungan Umroh / Haji</span>			
					<p class="jumlah">Rp. 3.500.000</p>
					<span class="sisa-pembayaran">Sisa Pembayaran : Rp 17.500.000</span>
				</div>
			</div>
		</div>
		<div class="row row-2" style="position: relative;">
			<div class="col s6" style="display: table;">
				<div class="item">
					<span class="title-produk">Paket Pilihan</span><br>
					<span class="produk">Umroh plus 12 Hari</span>
					<p class="jumlah">Rp. 20.500.000</p>
				</div>
			</div>
			<div class="col s6" style="display: table;">
				<div class="item item-red valign-wrapper">
					<span class="title-produk">Saldo Bayar Bayar</span>
					<p class="jumlah">Rp. 500.000</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col s12">
			<div class="secondary-menu">
				<ol class="circle-menu">
					<a href="{{ url('instruksi') }}">
						<li>
							<i class="icon icon-rupiah"></i>
							<span>Bayar Paket</span>
						</li>
					</a>
					<a href="#">
						<li>
							<i class="icon icon-scan-barcode"></i>
							<span>Scan Voucher</span>
						</li>
					</a>
					<a href="#">
						<li>
							<i class="icon icon-history"></i>
							<span>History</span>
						</li>
					</a>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="countdown">
				<ol>
					<li>
						<span class="detail">Hari</span>
						<span class="angka">132</span>
					</li>
					<li>
						<span class="detail">Jam</span>
						<span class="angka">23</span>
						
					</li>
					<li>
						<span class="detail">Menit</span>
						<span class="angka">59</span>
					</li>
					<li>
						<span class="detail">Detik</span>
						<span class="angka">59</span>
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="tenggat-waktu center-align">
			<span>Tenggat Waktu Pelunasan</span>
			<h5>12-04-2020</h5>
		</div>
	</div>
</div>
@endsection
