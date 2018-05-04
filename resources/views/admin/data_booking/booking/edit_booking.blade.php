@extends('admin.layout.app')
@section('title', 'Edit Booking')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Edit Booking
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-plane"></i> Data Booking</a></li>
	    <li class="active">Edit Booking</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-body">
		            	@if($errors->any())
							<div class="alert alert-danger alert-dismissible" role="alert">
							  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  	<ul>
							  		@foreach($errors->all() as $error)
							  		<li>{{ $error }}</li>
							  		@endforeach
							  	</ul>
							</div>
						@endif
		            	<form method="post" action="{{ url('index/admin/data-booking/booking/update', $booking->id_booking) }}">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
	            				<label>Nomor Transaksi</label>
	            				<input type="text" class="form-control" name="nomor_transaksi" value="{{ $booking->nomor_transaksi }}" placeholder="Nomor Transaksi">
		            		</div>
		            		<div class="form-group">
		            			<label>Voucher</label>
		            			<select name="voucher" id="select-voucher" class="form-control">
		            				<option disabled="" selected="">--Pilih Voucher--</option>
		            				<option value="">Tidak Punya Voucher</option>
		            				@foreach($voucher as $dataVoucher)
		            				<option value="{{ $dataVoucher->id_voucher }}" {{ Pemilihan::selected($dataVoucher->id_voucher, $booking->id_voucher, 'selected') }}>{{ $dataVoucher->kode_voucher }} - Rp {{ number_format($dataVoucher->nominal, 2, ',','.') }} - {{ $dataVoucher->nama_voucher }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
	            				<label>Status Pemesan</label><br>
	            				<label class="radio-inline">
	            					<input type="radio" name="status_pemesan" value="0" required {{ Pemilihan::selected($booking->status_pemesan, '0', 'checked') }}>Sedang Dipesan
	            				</label>
	            				<label class="radio-inline">
	            					<input type="radio" name="status_pemesan" value="1" {{ Pemilihan::selected($booking->status_pemesan, '1', 'checked') }}>Telah Diterima
	            				</label>
		            		</div>
	            			<button type="submit" class="btn btn-primary btn-flat">Edit</button>
		            	</form>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#select-voucher').select2();
	});
</script>
@endpush