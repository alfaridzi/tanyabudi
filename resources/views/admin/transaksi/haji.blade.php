@extends('admin.layout.app')
@section('title', 'Transaksi')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Transaksi Haji
	  </h1>
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
		            	{{-- <form method="get" action="{{ url('index/admin/transaksi/haji/search') }}" class="form-inline">
		            		<div class="form-group">
		            			<select class="form-control" name="status">
		            				<option selected="" disabled="">--Status--</option>
		            				<option value="0">Belum Konfirmasi</option>
		            				<option value="1">Sudah Konfirmasi</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<input type="text" name="tanggal_awal" placeholder="Tanggal Awal" class="form-control datepicker">
		            		</div>
		            		Ke
		            		<div class="form-group">
		            			<input type="text" name="tanggal_akhir" placeholder="Tanggal Akhir" class="form-control datepicker">
		            		</div>
		            		<div class="form-group">
		            			<input type="text" name="search" placeholder="Cari..." class="form-control">
		            		</div>
		            		<div class="form-group">
		            			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
		            		</div>
		            	</form> --}}
					</div>
		            <div class="box-body">
		            	<div class="table-responsive">
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<th>No</th>
			            				<th>Nomor Transaksi</th>
			            				<th>Nama Produk</th>
			            				<th>Deskripsi Produk</th>
			            				<th>Harga Produk</th>
			            				<th>Nama User</th>
			            				<th>Jumlah Pembayaran</th>
			            				<th>Tanggal Pembayaran</th>
			            				<th>Bukti Pembayaran</th>
			            				<th>Status</th>
			            				@can('konfirmasi transaksi')
			            				<th>Aksi</th>
			            				@endcan
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@foreach($haji as $dataHaji)
			            			<tr>
			            				<td>{{ $loop->iteration }}</td>
			            				<td>{{ $dataHaji->id_payment }}</td>
			            				<td>{{ $dataHaji->nama }}</td>
			            				<td>{{ $dataHaji->desc_prod }}</td>
			            				<td>Rp {{ number_format($dataHaji->harga, 2, ',', '.') }}</td>
			            				<td>{{ $dataHaji->name }}</td>
			            				<td>Rp {{ number_format($dataHaji->jumlah_pembayaran, 2, ',', '.') }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataHaji->tgl_pembayaran) }}</td>
			            				<td><img src="{{asset('bukti-tf/'.$dataHaji->foto)}}" class="img-responsive" width="150"></td>
			            				<td>{{ $dataHaji->status_pembayaran == 0 ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' }}</td>
			            				@can('konfirmasi transaksi')
			            				<td>
			            				@if($dataHaji->status_pembayaran == 0)
			            					<a href="javascript:;" id="btn-konfirmasi" data-id="{{ $dataHaji->id_payment }}" class="btn btn-success btn-flat">Konfirmasi</a>
			            				@endif
			            				</td>
			            				@endcan
			            			</tr>
			            			@endforeach
			            		</tbody>
			            	</table>
		            	</div>
		            	<div class="pull-right">
							{!! $haji->links() !!}
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
		$(document).on('click', '#btn-konfirmasi', function(e){
			e.preventDefault();
			var jawaban = confirm('Apakah anda yakin?');
            if (jawaban) {
            	var link = "{{ url('/') }}";
                var id = $(this).data('id');
                $('#frm-konfirmasi').attr('action', '{{ url('index/admin/transaksi/haji/konfirmasi/') }}/'+id);
                $('#frm-konfirmasi').submit();
            }

		});
	});
</script>
@endpush
			