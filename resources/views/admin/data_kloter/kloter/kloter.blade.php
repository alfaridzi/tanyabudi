@extends('admin.layout.app')
@section('title', 'Data Kloter')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Kloter
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Kloter</a></li>
	    <li class="active">Data Kloter</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-header">
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
		            	@if(Session::has('success'))
		            	<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong>{{ Session::get('success') }}</strong>
						</div>
		            	@endif
	            		@can('tambah kloter')
		            	<div class="pull-left">
		            		<a href="{{ url('index/admin/data-kloter/kloter/tambah') }}" class="btn btn-primary btn-flat">Tambah Kloter</a>
		            	</div>
		            	@endcan
	            		<div class="pull-right">
			            	<form class="form-inline" method="get" action="{{ url('index/admin/data-kloter/kloter/search') }}">
			            		<div class="form-group">
			            			<input type="text" name="tanggal_keberangkatan" class="form-control datepicker" placeholder="Tanggal Keberangkatan">
			            		</div>
			            		<div class="form-group">
			            			<input type="text" name="tanggal_kepulangan" class="form-control datepicker" placeholder="Tanggal Kepulangan">
			            		</div>
			            		<div class="form-group">
			            			<input type="search" name="search" class="form-control" placeholder="Cari...">
			            		</div>
			            		<div class="form-group">
			            			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
			            		</div>
			            	</form>
			            </div>
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kloter</th>
										<th>Kode Flight</th>
										<th>Tanggal Keberangkatan</th>
										<th>Maskapai Keberangkatan</th>
										<th>Via</th>
										<th>Tanggal Kepulangan</th>
										<th>Maskapai Kepulangan</th>
										<th>Seat Leader</th>
										<th>Total Seat</th>
										<th>Sisa Seat</th>
										<th>Jumlah Hari</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($kloter as $dataKloter)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataKloter->nama_kloter }}</td>
										<td>{{ $dataKloter->kode_flight }}</td>
										<td>{{ Tanggal::tanggalIndonesia($dataKloter->tanggal_keberangkatan) }}</td>
										<td>{{ $dataKloter->maskapai_keberangkatan }}</td>
										<td>{{ $dataKloter->via }}</td>
										<td>{{ Tanggal::tanggalIndonesia($dataKloter->tanggal_kepulangan) }}</td>
										<td>{{ $dataKloter->maskapai_kepulangan }}</td>
										<td>{{ $dataKloter->seat_leader }}</td>
										<td>{{ $dataKloter->total_seat }}</td>
										<td>{{ $dataKloter->total_seat - $dataKloter->hitung_seat }}</td>
										<td>{{ $dataKloter->jumlah_hari }}</td>
										<td>
											@can('edit kloter')
											<a href="{{ url('index/admin/data-kloter/kloter/edit', $dataKloter->id_kloter) }}" class="btn btn-warning btn-flat">Edit</a> 
											@endcan
											@can('delete kloter')
											<a href="javascript:;" id="btn-delete-kloter" data-id-kloter="{{ $dataKloter->id_kloter }}" class="btn btn-danger btn-flat">Delete</a>
											@endcan
											@if(!is_null($dataKloter->total_seat) && $dataKloter->total_seat != "" && $dataKloter->total_seat != '0')
											<a href="{{ url('index/admin/data-kloter/kloter/list-jamaah',$dataKloter->id_kloter) }}" class="btn btn-info btn-flat">List Jamaah</a></td>
											@endif
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $kloter->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-kloter" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-kloter', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_kloter = $(this).data('id-kloter');
                $('#frm-delete-kloter').attr('action', '{{ url('index/admin/data-kloter/kloter/delete') }}/'+id_kloter);
                $('#frm-delete-kloter').submit();
            }
        });
	});
</script>
@endpush