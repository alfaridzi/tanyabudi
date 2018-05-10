@extends('admin.layout.app')
@section('title', 'Data Permission')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Permission
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user-md"></i> Data Admin</a></li>
	    <li class="active">Permission</li>
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
		            	@can('tambah permission')
		            	<a href="{{ url('index/admin/permission/tambah') }}" class="btn btn-primary btn-flat">Tambah Permission</a>
		            	@endcan
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table class="table" id="table-permission">
								<thead>
									<tr>
										<th>No</th>
										<th>Permission</th>
										@can('delete permission')
										<th>Aksi</th>
										@endcan
									</tr>
								</thead>
								<tbody>
									@foreach($permission as $dataPermission)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataPermission->name }}</td>
										@can('delete permission')
										<td>
											<a href="javascript:;" class="btn btn-danger btn-flat" data-id-permission="{{ $dataPermission->id }}" id="btn-delete-permission">Delete</a>
										</td>
										@endcan
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-permission" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script src="{{ asset('admin/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#table-permission').DataTable({
			"order": [],
			"columnDefs": [{
	          "targets": 'no-sort',
	          "orderable": false,
	        }]
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-permission', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_permission = $(this).data('id-permission');
                $('#frm-delete-permission').attr('action', '{{ url('index/admin/permission/delete') }}/'+id_permission);
                $('#frm-delete-permission').submit();
            }
        });
	});
</script>
@endpush