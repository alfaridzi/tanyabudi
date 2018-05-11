@extends('admin.layout.app')
@section('title', 'Edit Role')
@push('css')
<style type="text/css">
	span.note {
		font-size: 11px;
		color: red;
	}
	ul.permission {
		position: relative;
		list-style: none;
	}

	ul.permission li {
		display: inline-block;
		width: 30%;
		height: 25px;
	}
</style>
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Edit Role
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user-md"></i> Data Admin</a></li>
	    <li>Data Role</li>
	    <li class="active">Edit Role</li>
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
		            	<form method="post" action="{{ url('index/admin/role/update', $role->id) }}">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
	            				<label>Nama</label>
	            				<input type="text" class="form-control" name="nama" placeholder="Nama Role" value="{{ $role->name }}" required>
	            				<span class="note">*contoh nama role: nama-role, ditulis dengan huruf kecil dan tanpa spasi</span>
		            		</div>
		            		<div class="checkbox">
		            			<label>
		            				<input type="checkbox" name="super_admin" id="q-super-admin" value="1" {{ $super_admin == '1' ? 'checked' : '' }}>Ini Super Admin?
		            			</label>
		            		</div>
		            		<div class="form-group col-md-12 hide-permission">
		            			<label>Permission:</label>
			            		<div class="checkbox">
			            			<div class="col-md-10">
			            				<label>Menu: </label>
			            				<ul class="permission">
				            			@foreach($permission_menu as $key => $dataMenu)
				            				<li>
						            			<label>
						            				<input type="checkbox" name="permission[]" value="{{ $dataMenu->id }}"
						            				@if(!$role->permissions->isEmpty())
						            					@foreach($role->permissions as $dataRole)
						            						@if($dataRole->id == $dataMenu->id)
						            							checked
						            						@endif
						            					@endforeach
						            				@endif
						            				>{{ $dataMenu->name }}
						            			</label>
					            			</li>
				            			@endforeach
				            			</ul>
			            			</div>
			            			<div class="col-md-10">
			            				<label>Action: </label>
				            			<ul class="permission">
				            			@foreach($permission_action as $key => $dataAction)
				            				<li>
						            			<label>
						            				<input type="checkbox" name="permission[]" value="{{ $dataAction->id }}"
						            				@if(!$role->permissions->isEmpty())
						            					@foreach($role->permissions as $dataRole)
						            						@if($dataRole->id == $dataAction->id)
						            							checked
						            						@endif
						            					@endforeach
						            				@endif
						            				>{{ $dataAction->name }}
						            			</label>
					            			</li>
				            			@endforeach
				            			</ul>
			            			</div>
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
<script type="text/javascript">
	$(document).ready(function(){
		if ($('#q-super-admin').is(':checked')) {
			$('.hide-permission').hide();
		}
		$(document).on('click', '#q-super-admin', function(){
			if ($(this).is(':checked')) {
				$('.hide-permission').hide();
			}else{
				$('.hide-permission').show();
			}
		});
	});
</script>
@endpush