@extends('admin.layout.app')
@section('title', 'Tambah Admin')
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
	    Tambah Admin
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user-md"></i> Data Admin</a></li>
	    <li class="active">Tambah Admin</li>
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
		            	<form method="post" action="{{ url('index/admin/user/'.$id_karyawan.'/tambah/simpan') }}">
		            		@csrf
		            		<div class="form-group">
	            				<label>Username</label>
	            				<input type="text" class="form-control" name="username" placeholder="Username" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Password</label>
		            			<input type="password" class="form-control" name="password" placeholder="Password">
		            		</div>
		            		<div class="form-group">
		            			<label>Konfirmasi Password</label>
		            			<input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
		            		</div>
		            		<div class="form-group">
		            			<label>Role</label>
		            			<select class="form-control" name="role">
		            				<option disabled="" selected="">--Pilih Role--</option>
		            				@foreach($role as $dataRole)
		            				<option value="{{ $dataRole->id }}">{{ ucwords(str_replace('-', ' ', $dataRole->name)) }}</option>
		            				@endforeach
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