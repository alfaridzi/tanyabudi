@extends('admin.layout.app')
@section('title', 'List Transaksi Agen '.$agen->name)
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    List Transaksi
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-group"></i> Data User</a></li>
	    <li>Data Agen</li>
	    <li class="active">List Transaksi</li>
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
		            	<form class="form-inline" method="get" action="{{ url('index/admin/data-user/agen/'.$agen->id.'/list-transaksi/search') }}">
		            		<div class="form-group">
		            			<input type="text" name="tanggal_transaksi" class="form-control datepicker" placeholder="Tanggal Transaksi">
		            		</div>
		            		<div class="form-group">
		            			<input type="search" name="search" class="form-control" placeholder="Cari...">
		            		</div>
		            		<div class="form-group">
		            			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
		            		</div>
		            	</form>
		            </div>
		            <div class="box-body">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama User</th>
									<th>Tanggal Transaksi</th>
									<th>Nama Paket</th>
									<th>Harga</th>
									<th>Tagihan</th>
									<th>Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $dataUser)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataUser->name }}</td>
									<td>{{ Tanggal::tanggalIndonesia($dataUser->tgl_pembayaran) }}</td>
									<td>{{ $dataUser->nama }}</td>
									<td>Rp {{ number_format($dataUser->harga, 2, ',', '.') }}</td>
									<td>belum tau</td>
									<td>Rp {{ number_format($dataUser->jumlah_pembayaran, 2, ',', '.') }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="pull-right">
							{{ $user->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-konfirmasi" action="" method="post">
	@csrf
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
		$(document).on('click', '#btn-konfirmasi', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin mengubah status user ini?');

            if (jawaban) {
                var id_user = $(this).data('id-user');
                $('#frm-konfirmasi').attr('action', '{{ url('index/admin/data-user/agen/konfirmasi') }}/'+id_user);
                $('#frm-konfirmasi').submit();
            }
        });
	});
</script>
@endpush