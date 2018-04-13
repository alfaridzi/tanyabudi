@extends('user.layout.app')
@section('page-title', 'Dashboard User')
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
	<div class="row valign-wrapper">
		<div class="col l2 m2">
			<img src="{{ asset('assets/images/user-1.png') }}" class="circle responsive-img" width="130" height="130">
			<div class="center-align nama-user">
				<span>Rika Sartika</span>
			</div>
		</div>
		<div class="col l10 m10">
			<div class="tabungan-haji">
				<span><b>Jumlah Tabungan Umroh / Haji</b></span>			
				<h5>Rp. 3.500.000</h5>
				<span class="sisa-pembayaran">Sisa Pembayaran : Rp 17.500.000</span>
			</div>
		</div>
	</div>
	<div class="row" style="position: relative;">
		<div class="col s6">
			<div class="item">
				<span>Paket Pilihan</span><br>
				<span><b>Umroh plus 12 Hari</b></span>
				<h5>Rp. 20.500.000</h5>
			</div>
		</div>
		<div class="col s6">
			<div class="item item-red valign-wrapper">
				<span>Saldo Bayar Bayar</span>
				<h5>Rp. 500.000</h5>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col s12">
			<div class="secondary-menu">
				<ol class="circle-menu">
					<a href="instruksi">
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
							<i class="icon icon-top-up"></i>
							<span>Top Up Bayar-Bayar</span>
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
@endsection
