@extends('admin.layout.app')
@section('title', 'Data Jamaah')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Jamaah
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Booking</a></li>
	    <li class="active">Data Jamaah</li>
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
		            	@can('tambah jamaah')
		            	<div class="pull-left">
		            		<a href="{{ url('index/admin/data-booking/jamaah/tambah') }}" class="btn btn-primary btn-flat">Tambah Jamaah</a>
		            	</div>
		            	@endcan
		            	<div class="pull-right">
			            	<form class="form-inline" method="get" action="{{ url('index/admin/data-booking/jamaah/search') }}">
			            		<div class="form-group">
			            			<select class="form-control" name="status_mahrom">
			            				<option disabled="" selected="">--Pilih Status Mahrom</option>
			            				<option value="0">Bukan Mahrom</option>
			            				<option value="1">Mahrom</option>
			            				<option value="">Belum Ditentukan</option>
			            			</select>
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
										<th>Kode Booking</th>
										<th>Nomor Transaksi</th>
										<th>Nomor Paspor</th>
										<th>Nama Jamaah</th>
										<th>Jumlah Kuota</th>
										<th>Nama Paket</th>
										<th>Jenis Paket</th>
										<th>Status Mahrom</th>
										<th>Bus</th>
										<th>Nomor Kamar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($jamaah as $dataJamaah)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataJamaah->kode_booking }}</td>
										<td>{{ $dataJamaah->id_transaksi }}</td>
										<td>
											{{ $dataJamaah->nomor_paspor }}<br>
											@can('edit paspor')
											<a href="{{ url('index/admin/data-booking/paspor/edit', $dataJamaah->id_paspor) }}" class="btn btn-info btn-flat">Edit Paspor</a>
											@endcan
										</td>
										<td>{{ $dataJamaah->nama_paspor }}</td>
										<td>{{ $dataJamaah->kuota }}</td>
										<td>{{ $dataJamaah->nama }}</td>
										<td>
											@if($dataJamaah->type == '1')
											Haji
											@elseif($dataJamaah->type == '2')
											Umroh
											@endif
										</td>
										<td>
											@if($dataJamaah->status_mahrom == '0')
											Bukan Mahrom
											@elseif($dataJamaah->status_mahrom == '1')
											Mahrom
											@else
											Belum Ditentukan
											@endif
										</td>
										<td>{{ $dataJamaah->kode_bus }}</td>
										<td>{{ $dataJamaah->kode_kamar }}</td>
										<td>
											@can('edit jamaah')
											<a href="{{ url('index/admin/data-booking/jamaah/edit', $dataJamaah->id_jamaah) }}" class="btn btn-warning btn-flat">Edit</a> 
											@endcan
											@can('delete jamaah')
											<a href="javascript:;" id="btn-delete-jamaah" data-id-jamaah="{{ $dataJamaah->id_jamaah }}" class="btn btn-danger btn-flat">Delete</a>
											@endcan
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $jamaah->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-jamaah" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-jamaah', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_jamaah = $(this).data('id-jamaah');
                $('#frm-delete-jamaah').attr('action', '{{ url('index/admin/data-booking/jamaah/delete') }}/'+id_jamaah);
                $('#frm-delete-jamaah').submit();
            }
        });
	});
</script>
@endpush