@extends('user.layout.app')
@section('page-title', 'Tabungan Umroh')
@section('content')

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="steps">
				<ol class="circle-steps text-steps">
					<li class="done">
						<span>Basic</span>
					</li>
					<li>
						<span>Advance</span>
					</li>
					<li>
						<span>Pro</span>
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
						<span>{{ Auth::user()->name }}</span>
					</div>
				</div>
				<a href="{{ url('total-bonus') }}">
					<div class="item item-kanan">
						<span class="title-produk">Total Bonus</span>			
						<p class="jumlah">Rp. 0</p>
					</div>
				</a>
			</div>
		</div>
		<div class="row row-2" style="position: relative;">
			<div class="col s6" style="display: table;">
				<div class="item">
					<span class="title-produk">Bonus Umroh / Haji</span><br>
					<p class="jumlah">Rp. 0</p>
				</div>
			</div>
			<div class="col s6" style="display: table;">
				<div class="item valign-wrapper">
					<span class="title-produk">Bonus Paket Wisata</span>
					<p class="jumlah">Rp. 0</p>
				</div>
			</div>
		</div>
		<div class="row row-2" style="position: relative;">
			<div class="col s6" style="display: table;">
				<div class="item">
					<span class="title-produk">Bonus Bayar-Bayar</span><br>
					<p class="jumlah">Rp. 0</p>
				</div>
			</div>
			<div class="col s6" style="display: table;">
				<div class="item item-red valign-wrapper">
					<span class="title-produk">Saldo Bayar Bayar</span>
					<p class="jumlah">Rp. 0</p>
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
					<a href="{{ url('list-voucher') }}">
						<li>
							<i class="icon icon-voucher"></i>
							<span>List Voucher</span>
						</li>
					</a>
					<a href="{{ url('list-referral') }}">
						<li>
							<i class="icon icon-user-referal"></i>
							<span>List Referral</span>
						</li>
					</a>
					<a href="#">
						<li>
							<i class="icon icon-scan-barcode"></i>
							<span>Scan Voucher</span>
						</li>
					</a>
					<a href="{{ url('tabungan-haji-umroh') }}">
						<li>
							<i class="icon icon-tabungan-haji"></i>
							<span>Tabungan Haji</span>
						</li>
					</a>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection
