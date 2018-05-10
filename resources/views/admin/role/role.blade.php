@extends('admin.layout.app')
@section('title', 'Data Admin')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Role
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user-md"></i> Data Admin</a></li>
	    <li>Admin</li>
	    <li class="active">Role</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-header">
		            	@if(Session::has('success'))
		            	<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong>{{ Session::get('success') }}</strong>
						</div>
		            	@endif
		            	@can('tambah role')
		            	<a href="{{ url('index/admin/role/tambah') }}" class="btn btn-primary btn-flat">Tambah Role</a>
		            	@endcan
		            </div>
		            <div class="box-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Role</th>
									<th>List Permission</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($role as $dataRole)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataRole->name }}</td>
									<td style="width:50%">
										@if($dataRole->permissions()->count() == $jumlah_permission)
										<label class="label label-primary">SUPER ADMIN</label>
										@else
										@foreach($dataRole->permissions()->pluck('name') as $dataPermission)
										<label class="label label-success">{{ $dataPermission }}</label>
										@endforeach
										@endif
									</td>
									<td>
										@can('edit role')
										<a href="{{ url('index/admin/role/edit', $dataRole->id) }}" class="btn btn-warning btn-flat">Edit</a> 
										@endcan
										@can('delete role')
										<a href="javascript:;" id="btn-delete-role" class="btn btn-danger btn-flat" data-id-role="{{ $dataRole->id }}">Delete</a>
										@endcan
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-role" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-role', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_role = $(this).data('id-role');
                $('#frm-delete-role').attr('action', '{{ url('index/admin/role/delete') }}/'+id_role);
                $('#frm-delete-role').submit();
            }
        });
	});
</script>
@endpush