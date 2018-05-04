@extends('admin.layout.app')
@section('title', 'Edit Voucher')
@push('css')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
<style type="text/css">
	span.note {
		font-size: 11px;
		color: red;
	}
</style>
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Edit Voucher
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-ticket"></i> Voucher</a></li>
	    <li class="active">Edit Voucher</li>
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
		            	<form method="post" action="{{ url('index/admin/voucher/update', $voucher->id_voucher) }}" enctype="multipart/form-data">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
		            			<label>Agen</label>
		            			<select class="form-control select2" name="agen" id="select-agen">
		            				<option selected="" disabled="">-- Pilih Agen--</option>
		            				@foreach($agen as $dataAgen)
		            				<option value="{{ $dataAgen->id }}" {{ Pemilihan::selected($dataAgen->id, $voucher->id_agen, 'selected') }}>{{ $dataAgen->email }} - {{ $dataAgen->name }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Kategori</label>
		            			<select class="form-control" name="kategori" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				<option value="1" {{ Pemilihan::selected($voucher->kategori, 1, 'selected') }}>Haji</option>
		            				<option value="2" {{ Pemilihan::selected($voucher->kategori, 2, 'selected') }}>Umroh</option>
		            				<option value="3" {{ Pemilihan::selected($voucher->kategori, 3, 'selected') }}>Wisata</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
	            				<label>Nama Voucher</label>
	            				<input type="text" class="form-control" name="nama_voucher" value="{{ $voucher->nama_voucher }}" placeholder="Nama Voucher" required>
		            		</diV>
		            		<div class="form-group">
		            			<label>Nominal</label>
		            			<input type="number" class="form-control" name="nominal" value="{{ $voucher->nominal }}" placeholder="Nominal" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Tanggal Mulai dan Akhir</label>
		            			<div class="form-inline">
		            				<input type="text" name="tanggal_mulai" placeholder="Tanggal Mulai" class="form-control datepicker" value="{{ date('Y-m-d', strtotime($voucher->tanggal_mulai)) }}" required>
		            				<span>s.d</span>
		            				<input type="text" name="tanggal_akhir" placeholder="Tanggal Akhir" class="form-control datepicker" value="{{ date('Y-m-d', strtotime($voucher->tanggal_akhir)) }}" required>
		            			</div>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});
	});
</script>
@endpush