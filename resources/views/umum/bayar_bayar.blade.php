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
							<a href="">
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
							<a href="">
								<img src="{{ asset('assets/images/bayar-bayar/pdam.png') }}" class="img-responsive">
								<span class="nama-produk">PDAM</span>
							</a>
						</li>
						<li>
							<a href="">
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
							<a href="{{ url('pembelian/pulsa/telkomsel') }}">
								<img src="{{ asset('assets/images/bayar-bayar/telkomsel.png') }}" class="img-responsive">
								<span class="nama-produk">TELKOMSEL</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa/tri') }}">
								<img src="{{ asset('assets/images/bayar-bayar/three.png') }}" class="img-responsive">
								<span class="nama-produk">TRI</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa/indosat') }}">
								<img src="{{ asset('assets/images/bayar-bayar/indosat.png') }}" class="img-responsive">
								<span class="nama-produk">INDOSAT</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa/smartfren') }}">
								<img src="{{ asset('assets/images/bayar-bayar/smartfren.png') }}" class="img-responsive">
								<span class="nama-produk">SMARTFREN</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/pulsa/xl') }}">
								<img src="{{ asset('assets/images/bayar-bayar/xl.png') }}" class="img-responsive">
								<span class="nama-produk">&nbsp;XL</span>
							</a>
						</li>


						<li>
							<a href="{{ url('pembelian/pulsa/axis') }}">
								<img src="{{ asset('assets/images/bayar-bayar/axis.png') }}" class="img-responsive">
								<span class="nama-produk">&nbsp;AXIS</span>
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
							<a href="{{ url('pembelian/grab') }}"">
								<img src="{{ asset('assets/images/bayar-bayar/grab.png') }}" class="img-responsive">
								<span class="nama-produk">GRAB</span>
							</a>
						</li>
						<li>
							<a href="{{ url('pembelian/gojek') }}"">
								<img src="{{ asset('assets/images/bayar-bayar/gojek.png') }}" class="img-responsive">
								<span class="nama-produk">GO-JEK</span>
							</a>
						</li>
					</ol>
				</div>
			</div>
		</div>



		<div class="row">
			<table class="table-responsive">
				<tr>
				
					<th>TRX ID</th>
					
					<th>jumlah Pembayaran</th>
					<th>Tgl Pembayaran</th>
					<th>Status</th>
				</tr>
				@foreach($data as $item)

				<tr>
					<td>{{ $item->id_pulsa }}</td>
					
					<td>{{ $item->jumlah_pembayaran }}</td>
					<td>{{ $item->tgl_pembayaran }}</td>
					<td><?php if(Pulsa::status($item->id_pulsa)->message[0]->status == 1) {
						echo 'Pending';

					} else if(Pulsa::status($item->id_pulsa)->message[0]->status == 2) {
						echo 'Gagal';
					} else if(Pulsa::status($item->id_pulsa)->message[0]->status == 3) {
						echo 'Refund';
					} else if(Pulsa::status($item->id_pulsa)->message[0]->status == 4) {
						echo 'Sukses';
					}
					;?></td>
					
				</tr>



				@endforeach
			</table>
		</div>


	</div>
</div>
@endsection
