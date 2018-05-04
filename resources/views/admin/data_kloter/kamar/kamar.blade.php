@extends('admin.layout.app')
@section('title', 'Data Kamar')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Kamar
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Kloter</a></li>
	    <li class="active">Data Kamar</li>
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
		            	<div class="col-md-2 col-sm-12 col-xs-12">
		            		<a href="{{ url('index/admin/data-kloter/kamar/tambah') }}" class="btn btn-primary btn-flat">Tambah Kamar</a>
		            	</div>
	            		<div class="col-md-10 col-sm-12 col-xs-12">
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
										<th>Nama Kloter</th>
										<th>Kode Kamar</th>
										<th>Kode Flight</th>
										<th>Tipe Kamar</th>
										<th>Kuota</th>
										<th>Sisa Kuota</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($kamar as $dataKamar)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataKamar->nama_kloter }}</td>
										<td>{{ $dataKamar->kode_kamar }}</td>
										<td>{{ $dataKamar->kode_flight }}</td>
										<td>{{ $dataKamar->tipe_kamar }}</td>
										<td>{{ $dataKamar->kuota }}</td>
										<td>{{ $dataKamar->kuota - $dataKamar->hitung_kuota }}</td>
										<td><a href="{{ url('index/admin/data-kloter/kamar/edit', $dataKamar->id_kamar) }}" class="btn btn-warning btn-flat">Edit</a> <a href="javascript:;" id="btn-delete-kamar" data-id-kamar="{{ $dataKamar->id_kamar }}" class="btn btn-danger btn-flat">Delete</a> 
											@if(!is_null($dataKamar->kuota) && $dataKamar->kuota != "" && $dataKamar->kuota != '0')
											<a href="{{ url('index/admin/data-kloter/kamar/list-jamaah',$dataKamar->id_kamar) }}" class="btn btn-info btn-flat">List Jamaah</a></td>
											@endif</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $kamar->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-kamar" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-kamar', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_kamar = $(this).data('id-kamar');
                $('#frm-delete-kamar').attr('action', '{{ url('index/admin/data-kloter/kamar/delete') }}/'+id_kamar);
                $('#frm-delete-kamar').submit();
            }
        });
	});
</script>
@endpush