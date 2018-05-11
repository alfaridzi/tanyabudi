@extends('admin.layout.app')
@section('title', 'Pengaturan User')
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
	    Pengaturan User
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user-md"></i> Pengaturan User</a></li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-body">
		            	@if(Session::has('success'))
		            	<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong>{{ Session::get('success') }}</strong>
						</div>
		            	@endif
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
		            	<form method="post" action="{{ url('index/admin/pengaturan/user/update') }}">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
		            			<label>Username</label>
		            			<input type="text" name="username" class="form-control" placeholder="Username" value="{{ Auth::guard('admin')->user()->username }}" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Password</label>
		            			<input type="password" name="password" id="password" class="form-control" placeholder="Password" minlength="5">
		            		</div>
		            		<div class="form-group hide-password">
		            			<label>Password Konfirmasi</label>
		            			<input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
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
<script type="text/javascript">
	$(document).ready(function(){
		$('.hide-password').hide();
		$(document).on('keyup', '#password', function(){
			var value = $(this).val();
			if (value != "") {
				$('.hide-password').show();
			}else{
				$('.hide-password').hide();
			}
		});
	});
</script>
@endpush