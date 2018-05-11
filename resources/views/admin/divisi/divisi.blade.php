@extends('admin.layout.app')
@section('title', 'Data Divisi')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Divisi
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-building"></i> Divisi</a></li>
	    <li class="active">Data Divisi</li>
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
		            	@can('tambah divisi')
		            	<a href="{{ url('index/admin/divisi/tambah') }}" class="btn btn-primary btn-flat">Tambah Divisi</a>
		            	@endcan
		            </div>
		            <div class="box-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Divisi</th>
									<th>Nama Divisi</th>
									<th>Tanggal Dibuat</th>
									<th>Tanggal Diperbarui</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($divisi as $dataDivisi)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataDivisi->kode_divisi }}</td>
									<td>{{ $dataDivisi->nama_divisi }}</td>
									<td>{{ Tanggal::tanggalIndonesiaLengkap($dataDivisi->created_at) }}</td>
									<td>{{ Tanggal::tanggalIndonesiaLengkap($dataDivisi->updated_at) }}</td>
									<td>
										@can('edit divisi')
										<a href="{{ url('index/admin/divisi/edit', $dataDivisi->kode_divisi) }}" class="btn btn-warning btn-flat">Edit</a> 
										@endcan
										@can('delete divisi')
										<a href="javascript:;" id="btn-delete-divisi" class="btn btn-danger btn-flat" data-kode-divisi="{{ $dataDivisi->kode_divisi }}">Delete</a></td>
										@endcan
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pull-right">
							{{ $divisi->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-divisi" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-divisi', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var kode_divisi = $(this).data('kode-divisi');
                $('#frm-delete-divisi').attr('action', '{{ url('index/admin/divisi/delete') }}/'+kode_divisi);
                $('#frm-delete-divisi').submit();
            }
        });
	});
</script>
@endpush