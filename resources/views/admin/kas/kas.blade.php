@extends('admin.layout.app')
@section('title', 'Report Admin')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<style type="text/css">
	img {
		max-height: 100px;
	}
</style>
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Kas
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-book"></i> Report</a></li>
	    <li class="active">Data Kas</li>
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
		            	@can('tambah kas')
		            	<div class="pull-left">
		            		<a href="{{ url('index/admin/kas/tambah') }}" class="btn btn-primary btn-flat">Tambah Kas</a>
		            	</div>
		            	@endcan
		            	<div class="pull-right">
		            		<form action="{{ url('index/admin/kas/search') }}" class="form-inline">
		            			<div class="form-group">
		            				<select class="form-control" name="kode_kantor" id="kode_kantor">
		            					<option disabled="" selected="">--Kode Kantor--</option>
		            					@foreach($jabatan as $dataJabatan)
		            					<option value="{{ $dataJabatan->kode_cabang }}">{{ $dataJabatan->kode_cabang }}</option>
		            					@endforeach
		            				</select>
		            			</div>
		            			<div class="form-group">
		            				<select class="form-control" name="tipe">
		            					<option disabled="" selected="">--Tipe--</option>
		            					<option value="0">Credit</option>
		            					<option value="1">Debit</option>
		            				</select>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="tanggal_awal" class="form-control datepicker" placeholder="Tanggal Awal">
		            			</div>
		            			Ke
		            			<div class="form-group">
		            				<input type="text" name="tanggal_akhir" class="form-control datepicker" placeholder="Tanggal Akhir">
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="search" class="form-control" placeholder="Cari...">
		            			</div>
		            			<div class="form-group">
		            				<button class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
		            			</div>
		            		</form>
		            	</div>
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table class="table" id="table-permission">
								<thead>
									<tr>
										<th>No</th>
										<th>Nomor Bukti</th>
										<th>Kode Cabang</th>
										<th>Tanggal Transaksi</th>
										<th>Keterangan</th>
										<th>Tipe</th>
										<th>Bukti</th>
										<th>Admin Penginput</th>
										<th>Admin Update</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($kas as $dataKas)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataKas->nomor_bukti }}</td>
										<td>{{ $dataKas->kode_kantor }}</td>
										<td>{{ Tanggal::tanggalIndonesia($dataKas->tanggal_transaksi) }}</td>
										<td>{{ $dataKas->keterangan }}</td>
										<td>
											@if($dataKas->tipe == '0')
											Credit
											@elseif($dataKas->tipe == '1')
											Debit
											@endif
										</td>
										<td>
											@if(!is_null($dataKas->bukti))
											<img src="{{ asset('admin/images/kas/'. $dataKas->bukti) }}" class="img-responsive">
											@else
											Tidak ada
											@endif
										</td>
										<td>{{ $dataKas->admin_penginput }}</td>
										<td>{{ $dataKas->admin_update }}</td>
										<td>
											@can('edit kas')
											<a href="{{ url('index/admin/kas/edit', $dataKas->id_kas) }}" class="btn btn-warning btn-flat">Edit</a>
											@endcan
											@can('delete kas')
											<a href="javascript:;" id="btn-delete-kas" data-id-kas="{{ $dataKas->id_kas }}" class="btn btn-danger btn-flat">Delete</a>
											@endcan
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="pull-right">
								{{ $kas->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-kas" method="post" action="">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});
		$('#kode_kantor').select2();
	});
</script>
<script type="text/javascript">
	$(document).on('click', '#btn-delete-kas', function(e){
        e.preventDefault();
        var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

        if (jawaban) {
            var id_kas = $(this).data('id-kas');
            $('#frm-delete-kas').attr('action', '{{ url('index/admin/kas/delete') }}/'+id_kas);
            $('#frm-delete-kas').submit();
        }
    });
</script>
@endpush