@extends('user.layout.app-1')
@section('page-title', 'Total Bonus')
@push('css')
<style type="text/css">
	.total-bonus {
		margin-top: 10px;
	}
	.total-bonus a {
		width: 100%;
		color: #363636;
		font-weight: bold;
		font-size: 13px;
	}

</style>
@endpush
@section('content')
<div class="total-bonus">
	<div class="container">
		<div class="row" style="position: relative;">
			<div class="user-content">
				<div class="col s12" style="display: table;">
					<div class="item">
						<span class="title-produk">Bonus Umroh / Haji</span><br>
						<p class="jumlah">Rp. 7.000.000</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<a href="#">Transfer Bonus ke Tabungan Umroh/Haji</a>
				<hr>	
			</div>
			<div class="col s12">
				<a href="#">Transfer Bonus ke Saldo Bayar-Bayar</a>
				<hr>
			</div>
			<div class="col s12">
				<a href="#">Transfer Bonus Untuk Pencairan</a>
				<hr>
			</div>
		</div>
	</div>
</div>
@endsection