@extends('admin.layout.app')
@section('title', 'Edit Kamar')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
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
	    Edit Kamar
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Kloter</a></li>
	    <li class="active">Edit Kamar</li>
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
		            	<form method="post" action="{{ url('index/admin/data-kloter/kamar/update', $kamar->id_kamar) }}">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
		            			<label>Kloter</label>
		            			<select class="form-control select2" name="kloter" id="select-kloter">
		            				<option selected="" disabled="">-- Pilih Kloter--</option>
		            				@foreach($kloter as $dataKloter)
		            				<option value="{{ $dataKloter->id_kloter }}" {{ Pemilihan::selected($kamar->id_kloter, $dataKloter->id_kloter, 'selected') }}>{{ $dataKloter->nama_kloter}} - {{ $dataKloter->kode_flight }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Kode Kamar</label>
		            			<input type="text" name="kode_kamar" class="form-control" value="{{ $kamar->kode_kamar }}" placeholder="Kode Kamar" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Tipe Kamar</label>
		            			<input type="text" name="tipe_kamar" class="form-control" value="{{ $kamar->tipe_kamar }}" placeholder="Tipe Kamar" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Kuota</label>
		            			<input type="number" class="form-control" name="kuota" value="{{ $kamar->kuota }}" placeholder="Kuota" required>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#select-kloter').select2();
	});
</script>
@endpush