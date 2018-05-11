@extends('admin.layout.app')
@section('title', 'Data Admin')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Admin
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user-md"></i> Data Admin</a></li>
	    <li>Admin</li>
	    <li class="active">Admin</li>
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
		            </div>
		            <div class="box-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Kode Divisi</th>
									<th>Kode Jabatan</th>
									<th>Role</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($admin as $dataAdmin)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataAdmin->karyawans->nik }}</td>
									<td>{{ $dataAdmin->karyawans->nama }}</td>
									<td>{{ $dataAdmin->username }}</td>
									<td>{{ $dataAdmin->karyawans->kode_divisi }}</td>
									<td>{{ $dataAdmin->karyawans->kode_jabatan }}</td>
									<td>{{ ucwords(str_replace('-', ' ', $dataAdmin->getRoleNames()[0])) }}</td>
									<td>
										@can('edit admin')
										<a href="{{ url('index/admin/user/edit', $dataAdmin->id_admin) }}" class="btn btn-warning btn-flat">Edit</a> 
										@endcan
										@can('delete admin')
										@if(Auth::user()->id_admin != $dataAdmin->id_admin)
										<a href="javascript:;" id="btn-delete-admin" class="btn btn-danger btn-flat" data-id-admin="{{ $dataAdmin->id_admin }}">Delete</a>
										@endif
										@endcan
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pull-right">
							{!! $admin->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-admin" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-admin', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');
            
            if (jawaban) {
                var id_admin = $(this).data('id-admin');
                $('#frm-delete-admin').attr('action', '{{ url('index/admin/user/delete') }}/'+id_admin);
                $('#frm-delete-admin').submit();
            }
        });
	});
</script>
@endpush