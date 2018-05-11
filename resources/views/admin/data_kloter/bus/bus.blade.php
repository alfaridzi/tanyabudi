@extends('admin.layout.app')
@section('title', 'Data Bus')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Bus
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Kloter</a></li>
	    <li class="active">Data Bus</li>
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
		            	@can('tambah bus')
		            	<div class="pull-left">
		            		<a href="{{ url('index/admin/data-kloter/bus/tambah') }}" class="btn btn-primary btn-flat">Tambah Bus</a>
		            	</div>
		            	@endcan
	            		<div class="pull-right">
		            		<div class="pull-right">
				            	<form class="form-inline" method="get" action="{{ url('index/admin/data-kloter/bus/search') }}">
				            		<div class="form-group">
				            			<input type="search" name="search" class="form-control" placeholder="Cari...">
				            		</div>
				            		<div class="form-group">
				            			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
				            		</div>
				            	</form>
				            </div>
		            	</div>
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Bus</th>
										<th>Kode Flight</th>
										<th>Nama Kloter</th>
										<th>Nama Bus</th>
										<th>Seat</th>
										<th>Sisa Seat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($bus as $dataBus)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataBus->kode_bus }}</td>
										<td>{{ $dataBus->kode_flight }}</td>
										<td>{{ $dataBus->nama_kloter }}</td>
										<td>{{ $dataBus->nama_bus }}</td>
										<td>{{ $dataBus->seat_bus }}</td>
										<td>{{ $dataBus->seat_bus - $dataBus->hitung_seat }}</td>
										<td>
											@can('edit bus')
											<a href="{{ url('index/admin/data-kloter/bus/edit', $dataBus->id_bus) }}" class="btn btn-warning btn-flat">Edit</a> 
											@endcan
											@can('delete bus')
											<a href="javascript:;" id="btn-delete-bus" data-id-bus="{{ $dataBus->id_bus }}" class="btn btn-danger btn-flat">Delete</a>
											@endcan
											@if(!is_null($dataBus->total_seat) && $dataBus->total_seat != "" && $dataBus->total_seat != '0')
											<a href="{{ url('index/admin/data-kloter/bus/list-jamaah',$dataBus->id_bus) }}" class="btn btn-info btn-flat">List Jamaah</a></td>
											@endif</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $bus->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-bus" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-bus', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_bus = $(this).data('id-bus');
                $('#frm-delete-bus').attr('action', '{{ url('index/admin/data-kloter/bus/delete') }}/'+id_bus);
                $('#frm-delete-bus').submit();
            }
        });
	});
</script>
@endpush