@extends('admin.layout.app')
@section('title', 'Edit Kloter')
@push('css')
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
	    Edit Kloter
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Kloter</a></li>
	    <li class="active">Edit Kloter</li>
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
		            	<form method="post" action="{{ url('index/admin/data-kloter/kloter/update', $kloter->id_kloter) }}">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
		            			<label>Nama Kloter</label>
		            			<input type="text" name="nama_kloter" class="form-control" placeholder="Nama Kloter" value="{{ $kloter->nama_kloter }}" required>
		            			<span class="note">*Masukkan Nama Kloter yang Berbeda dengan Nama Kloter yang sudah ada</span>
		            		</div>
		            		<div class="form-group">
		            			<label>Kode Flight</label>
		            			<input type="text" class="form-control" name="kode_flight" placeholder="Kode Flight" value="{{ $kloter->kode_flight }}">
		            		</div>
		            		<div class="form-group">
	            				<label>Tanggal Keberangkatan</label>
	            				<input type="text" class="form-control datepicker" name="tanggal_keberangkatan" placeholder="Tanggal Keberangkatan" value="{{ $kloter->tanggal_keberangkatan }}">
		            		</div>
		            		<div class="form-group">
		            			<label>Maskapai Keberangkatan</label>
		            			<input type="text" class="form-control" name="maskapai_keberangkatan" placeholder="Maskapai Keberangkatan" value="{{ $kloter->maskapai_keberangkatan }}">
		            		</div>
		            		<div class="form-group">
		            			<label>Via</label>
		            			<input type="text" class="form-control" name="via" class="Via" placeholder="Via" value="{{ $kloter->via }}">
		            		</div>
		            		<div class="form-group">
		            			<label>Tanggal Kepulangan</label>
		            			<input type="text" class="form-control datepicker" name="tanggal_kepulangan" placeholder="Tanggal Kepulangan" value="{{ $kloter->tanggal_kepulangan }}">
		            		</div>
		            		<div class="form-group">
		            			<label>Maskapai Kepulangan</label>
		            			<input type="text" class="form-control" name="maskapai_kepulangan" placeholder="Maskapai Kepulangan" value="{{ $kloter->maskapai_kepulangan }}">
		            		</div>
		            		<div class="form-group">
		            			<label>Seat Leader</label>
		            			<input type="text" class="form-control" name="seat_leader" placeholder="Seat Leader" value="{{ $kloter->seat_leader }}">
		            		</div>
		            		<div class="form-group">
		            			<label>Total Seat</label>
		            			<input type="number" class="form-control" name="total_seat" placeholder="Total Seat" value="{{ $kloter->total_seat }}">
		            		</div>
		            		<div class="form-group">
		            			<label>Jumlah Hari</label>
		            			<input type="number" class="form-control" name="jumlah_hari" placeholder="Jumlah Hari" value="{{ $kloter->jumlah_hari }}">
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