@extends('admin.layout.app')
@section('title', 'Tambah Informasi')
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
	    Tambah Informasi
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-info-circle"></i> Informasi</a></li>
	    <li class="active">Tambah Informasi</li>
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
		            	<form method="post" action="{{ url('index/admin/pengaturan/informasi/tambah/simpan') }}">
		            		@csrf
		            		<div class="form-group">
	            				<label>Judul</label>
	            				<input type="text" class="form-control" name="judul" placeholder="Judul" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Isi</label>
		            			<textarea class="form-control" name="isi" placeholder="Isi" maxlength="150"></textarea>
		            		</div>
		            		<div class="form-group">
	            				<label>Kategori</label>
	            				<input type="text" class="form-control" name="kategori" placeholder="Kategori" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Role</label>
		            			<select class="form-control" name="role">
		            				<option disabled="" selected="">--Pilih Role--</option>
		            				<option value="1">User</option>
		            				<option value="2">Agen</option>
		            			</select>
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