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
							<table class="table" id="table-rincian">
								<thead>
									<tr>
										<th>No</th>
										<th>Isi Log</th>
									</tr>
								</thead>
								<tbody>
									@foreach($log as $dataLog)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataLog->isi_log }}</td>
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
		$('#table-rincian').DataTable({
			"order": [],
			"columnDefs": [{
	          "targets": 'no-sort',
	          "orderable": false,
	        }]
		});
	});
</script>
@endpush