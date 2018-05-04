@extends('admin.layout.app')
@section('title', 'Tambah Voucher')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
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
	    Tambah Voucher
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-ticket"></i> Voucher</a></li>
	    <li class="active">Tambah Voucher</li>
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
		            	<form method="post" action="{{ url('index/admin/voucher/tambah/simpan') }}" enctype="multipart/form-data">
		            		@csrf
		            		<div class="form-group">
		            			<label>Agen</label>
		            			<select class="form-control select2" name="agen" id="select-agen">
		            				<option selected="" disabled="">-- Pilih Agen--</option>
		            				@foreach($agen as $dataAgen)
		            				<option value="{{ $dataAgen->id }}">{{ $dataAgen->email }} - {{ $dataAgen->name }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Kategori</label>
		            			<select class="form-control" name="kategori" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				<option value="1">Haji</option>
		            				<option value="2">Umroh</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
	            				<label>Nama Voucher</label>
	            				<input type="text" class="form-control" name="nama_voucher" placeholder="Nama Voucher" required>
		            		</diV>
		            		<div class="form-group">
		            			<label>Nominal</label>
		            			<input type="number" class="form-control" name="nominal" placeholder="Nominal" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Tanggal Mulai dan Akhir</label>
		            			<div class="form-inline">
		            				<input type="text" name="tanggal_mulai" placeholder="Tanggal Mulai" class="form-control datepicker" required>
		            				<span>s.d</span>
		            				<input type="text" name="tanggal_akhir" placeholder="Tanggal Akhir" class="form-control datepicker" required>
		            			</div>
		            		</div>
	            			<button type="submit" class="btn btn-primary btn-flat">Tambah</button>
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
    	$('#select-agen').select2();
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});
	});
</script>
@endpush