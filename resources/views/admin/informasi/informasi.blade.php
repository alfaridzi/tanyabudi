@extends('admin.layout.app')
@section('title', 'Informasi')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Informasi
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-info-circle"></i> Informasi</a></li>
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
		            	@can('tambah informasi')
		            	<a href="{{ url('index/admin/pengaturan/informasi/tambah') }}" class="btn btn-primary btn-flat">Tambah Informasi</a>
		            	@endcan
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Kategori</th>
										<th>Role</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($informasi as $dataInformasi)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataInformasi->judul }}</td>
										<td>{{ $dataInformasi->isi }}</td>
										<td>{{ $dataInformasi->kategori }}</td>
										<td>
											@if($dataInformasi->role == '1')
											User
											@elseif($dataInformasi->role == '2')
											Agen
											@endif
										</td>
										<td>
											@can('edit informasi')
											<a href="{{ url('index/admin/pengaturan/informasi/edit', $dataInformasi->id_informasi) }}" class="btn btn-warning btn-flat">Edit</a> 
											@endcan
											@can('delete informasi')
											<a href="javascript:;" id="btn-delete-informasi" data-id-informasi="{{ $dataInformasi->id_informasi }}" class="btn btn-danger btn-flat">Delete</a>
											@endcan
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $informasi->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-informasi" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-informasi', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_informasi = $(this).data('id-informasi');
                $('#frm-delete-informasi').attr('action', '{{ url('index/admin/pengaturan/informasi/delete') }}/'+id_informasi);
                $('#frm-delete-informasi').submit();
            }
        });
	});
</script>
@endpush