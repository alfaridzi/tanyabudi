@extends('admin.layout.app')
@section('title', 'Report Admin')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Report Admin
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-book"></i> Report</a></li>
	    <li class="active">Report Admin</li>
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
		            	<div class="table-responsive">
							<table class="table" id="table-permission">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIK</th>
										<th>Total Input Per Hari</th>
										<th>Total Input Per Bulan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($admin as $dataAdmin)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataAdmin->get_karyawan->nama }}</td>
										<td>{{ $dataAdmin->get_karyawan->nik }}</td>
										<td>{{ $dataAdmin->log()->whereBetween('created_at', [$tanggal_awal_hari, $tanggal_akhir_hari])->count() }}</td>
										<td>{{ $dataAdmin->log()->whereBetween('created_at', [$tanggal_awal_bulan, $tanggal_akhir_bulan])->count() }}</td>
										<td><a href="{{ url('index/admin/report-admin/rincian-log', $dataAdmin->id_admin) }}" class="btn btn-info btn-flat">Rincian Log</a></td>
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
@endpush