@extends('admin.layout.app')
@section('title', 'Tambah Divisi')
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
	    Tambah Divisi
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-building"></i> Divisi</a></li>
	    <li class="active">Tambah Divisi</li>
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
		            	<form method="post" action="{{ url('index/admin/divisi/tambah/simpan') }}">
		            		@csrf
		            		<div class="form-group">
	            				<label>Kode Divisi</label>
	            				<input type="text" class="form-control" name="kode_divisi" placeholder="Kode Divisi" required>
	            				<span class="note">*Tanpa Spasi</span>
		            		</div>
		            		<div class="form-group">
	            				<label>Nama Divisi</label>
	            				<input type="text" class="form-control" name="nama_divisi" placeholder="Nama Divisi" required>
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