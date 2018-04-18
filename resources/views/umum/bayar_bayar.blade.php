@extends('user.layout.app')
@section('page-title', 'Dashboard User')
@section('content')

<div class="bayar-bayar">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="list-produk">
					<h5>Bayar Tagihan</h5>
					<ol>
						<li>
							<a href="{{ url('pembayaran/bpjs') }}">
								<img src="{{ asset('assets/images/bayar-bayar/bpjs.png') }}" class="img-responsive">
								<span class="nama-produk">BPJS</span>
							</a>
						</li>
						<li style="background-color: yellow">
							<a href="{{ url('pembayaran/pln') }}">
								<img src="{{ asset('assets/images/bayar-bayar/pln.png') }}" class="img-responsive">
								<span class="nama-produk">PLN</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembayaran/pdam') }}">
								<img src="{{ asset('assets/images/bayar-bayar/pdam.png') }}" class="img-responsive">
								<span class="nama-produk">PDAM</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembayaran/telkom') }}">
								<img src="{{ asset('assets/images/bayar-bayar/telkom.png') }}" class="img-responsive">
								<span class="nama-produk">TELKOM</span>
							</a>
						</li>
					</ol>
				</div>
			</div>
			<div class="col s12">
				<div class="list-produk">
					<h5>Pembelian Pulsa</h5>
					<ol>
						<li>
							<a href="{{ url('pembelian/pulsa') }}">
								<img src="{{ asset('assets/images/bayar-bayar/telkomsel.png') }}" class="img-responsive">
								<span class="nama-produk">TELKOMSEL</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa') }}">
								<img src="{{ asset('assets/images/bayar-bayar/three.png') }}" class="img-responsive">
								<span class="nama-produk">TRI</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa') }}">
								<img src="{{ asset('assets/images/bayar-bayar/indosat.png') }}" class="img-responsive">
								<span class="nama-produk">INDOSAT</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa') }}">
								<img src="{{ asset('assets/images/bayar-bayar/smartfren.png') }}" class="img-responsive">
								<span class="nama-produk">SMARTFREN</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa') }}">
								<img src="{{ asset('assets/images/bayar-bayar/xl.png') }}" class="img-responsive">
								<span class="nama-produk">&nbsp;XL</span>
							</a>
						</li>
					</ol>
				</div>
			</div>
			<div class="col s12">
				<div class="list-produk">
					<h5>Top Up Saldo</h5>
					<ol>
						<li>
							<a href="#">
								<img src="{{ asset('assets/images/bayar-bayar/grab.png') }}" class="img-responsive">
								<span class="nama-produk">GRAB</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('assets/images/bayar-bayar/gojek.png') }}" class="img-responsive">
								<span class="nama-produk">GO-JEK</span>
							</a>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
