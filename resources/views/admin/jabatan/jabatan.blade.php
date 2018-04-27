@extends('admin.layout.app')
@section('title', 'Data Jabatan')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Jabatan
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-briecase"></i> Jabatan</a></li>
	    <li class="active">Data Jabatan</li>
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
		            	<a href="{{ url('index/admin/jabatan/tambah') }}" class="btn btn-primary btn-flat">Tambah Jabatan</a>
		            </div>
		            <div class="box-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Jabatan</th>
									<th>Kode Divisi</th>
									<th>Nama Jabatan</th>
									<th>Deskripsi</th>
									<th>Wilayah</th>
									<th>Tanggal Dibuat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($jabatan as $dataJabatan)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataJabatan->kode_jabatan }}</td>
									<td>{{ $dataJabatan->kode_divisi }}</td>
									<td>{{ $dataJabatan->nama_jabatan }}</td>
									<td>{{ $dataJabatan->deskripsi }}</td>
									<td>{{ $dataJabatan->wilayah }}</td>
									<td>{{ Tanggal::tanggalIndonesiaLengkap($dataJabatan->created_at) }}</td>
									<td><a href="{{ url('index/admin/jabatan/edit', $dataJabatan->kode_jabatan) }}" class="btn btn-warning btn-flat">Edit</a> <a href="javascript:;" id="btn-delete-jabatan" data-kode-jabatan="{{ $dataJabatan->kode_jabatan }}" class="btn btn-danger btn-flat">Delete</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pull-right">
							{{ $jabatan->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-jabatan" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-jabatan', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var kode_jabatan = $(this).data('kode-jabatan');
                $('#frm-delete-jabatan').attr('action', '{{ url('index/admin/jabatan/delete') }}/'+kode_jabatan);
                $('#frm-delete-jabatan').submit();
            }
        });
	});
</script>
@endpush