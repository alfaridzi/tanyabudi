@extends('admin.layout.app')
@section('title', 'Edit Jabatan')
@push('css')
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
	    Edit Jabatan
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-building"></i> Jabatan</a></li>
	    <li class="active">Edit Jabatan</li>
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
		            	<form method="post" action="{{ url('index/admin/jabatan/update', $jabatan->kode_jabatan) }}">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
	            				<label>Kode Jabatan</label>
	            				<input type="text" class="form-control" name="kode_jabatan" placeholder="Kode Jabatan" value="{{ $jabatan->kode_jabatan }}" required>
	            				<span><span class="note">*Tanpa Spasi</span></span>
		            		</div>
		            		<div class="form-group">
		            			<label>Divisi</label>
		            			<select class="form-control" name="divisi" required>
		            				<option disabled="" selected="">--Pilih Salah Satu--</option>
		            				@foreach($divisi as $dataDivisi)
		            				<option value="{{ $dataDivisi->kode_divisi }}" {{ $dataDivisi->kode_divisi == $jabatan->kode_divisi ? 'selected' : '' }}>{{ $dataDivisi->nama_divisi }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
	            				<label>Nama Jabatan</label>
	            				<input type="text" class="form-control" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}" placeholder="Nama Divisi" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Deskripsi</label>
		            			<textarea class="form-control" placeholder="Deskripsi" name="deskripsi">{{ $jabatan->deskripsi }}</textarea>
		            		</div>
		            		<div class="form-group">
		            			<label>Wilayah</label>
		            			<input type="text" name="wilayah" value="{{ $jabatan->wilayah }}" class="form-control" placeholder="Wilayah">
		            		</div>
		            		<div class="form-group">
		            			<label>Kode Cabang</label>
		            			<input type="text" name="kode_cabang" class="form-control" placeholder="Kode Cabang" value="{{ $jabatan->kode_cabang }}">
		            			<span class="note">*contoh: MKS = untuk makasar</span>
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