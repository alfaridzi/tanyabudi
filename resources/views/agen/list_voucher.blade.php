@extends('user.layout.app-1')
@section('page-title', 'List Voucher')
@push('css')
<style type="text/css">
	.circle-icon {
		display: block;
		position: relative;
		width: 50px;
		height: 50px;
		border: 2px solid #363636;
		border-radius: 50%;
		margin: 15px auto 30px auto;
		color: #363636;
		font-weight: bold;
	}
	.circle-icon i {
		position: relative;
		top: -5px;
		bottom: 0;
		left: 0;
		right: 0;
	}

	.circle-icon .tipe-agen {
		position: absolute;
		top: 50px;
		bottom: 0;
		left: 0;
		right: 0;
		font-size: 12px;
	}

	.circle-icon .jumlah-voucher {
		position: absolute;
		top: 65px;
		bottom: 0;
		left: -20px;
		right: -20px;
		font-size: 13px;
	}
</style>
@endpush
@section('content')
<div class="list-voucher">
	<div class="container">
		<div class="row">
			<div class="circle-icon center-align">
				<i class="icon icon-star" style="font-size: 40px;"></i>
				<div class="tipe-agen">Basic</div>
				<span class="jumlah-voucher">2 Voucher</span>
			</div>
		</div>
	</div>
	<div class="page-break">
		List Voucher
	</div>
	<div class="container">
		<div class="row">
			<table>
				<tr>
					<th><b>No Voucher</b></th>
					<th class="right-align"><b>Status</b></th>
				</tr>
				
			
			</table>
		</div>
	</div>
</div>
@endsection