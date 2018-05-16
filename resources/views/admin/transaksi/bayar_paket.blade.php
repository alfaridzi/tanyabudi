@extends('admin.layout.app')
@section('title', 'Transaksi')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/lightbox/ekko-lightbox.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Transaksi Bayar Paket Haji / Umroh
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
						<form method="get" action="{{ url('index/admin/transaksi/bayar_paket/search') }}" class="form-inline">
		            		<input type="hidden" name="tipe" value="3910">
		            		<div class="form-group">
		            			<select class="form-control" name="status">
		            				<option selected="" disabled="">--Status--</option>
		            				<option value="0">Belum Konfirmasi</option>
		            				<option value="1">Diterima</option>
		            				<option value="2">Ditolak</option>
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
		            	</form>
					</div>
		            <div class="box-body">
		            	<div class="table-responsive">
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<th>No</th>
			            				<th>Transaksi</th>
			            				<th>Nama User</th>
			            				<th>Jumlah Pembayaran</th>
			            				<th>Tanggal Pembayaran</th>
			            				<th>Bukti Transfer</th>
			            				<th>Status</th>
			            				@can('konfirmasi transaksi')
			            				<th>Aksi</th>
			            				@endcan
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@foreach($paket as $dataPaket)
			            			<tr>
			            				<td>{{ $loop->iteration }}</td>
			            				<td>{{ $dataPaket->id_payment }}</td>
			            				<td>{{ $dataPaket->name }}</td>
			            				<td>Rp {{ number_format($dataPaket->jumlah_pembayaran, 2, ',', '.') }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataPaket->tgl_pembayaran) }}</td>
			            				<td><a href="{{url('bukti-tf/'.$dataPaket->foto.'/?image=250')}}" data-toggle="lightbox">Bukti</a></td>
			            				<td>
			            					@if($dataPaket->status == '0')
			            					Belum Dikonfimasi
			            					@elseif($dataPaket->status == '1')
			            					Diterima
			            					@elseif($dataPaket->status == '2')
			            					Ditolak
			            					@endif
			            				</td>
			            				@can('konfirmasi transaksi')
			            				<td>
			            				@if($dataPaket->status_pembayaran == 0)
			            					<a href="javascript:;" data-id="{{ $dataPaket->id_payment }}" data-status="1" class="btn btn-success btn-flat btn-konfirmasi"><i class="fa fa-check"></i></a>
			            					<a href="javascript:;" data-id="{{ $dataPaket->id_payment }}" data-status="2" class="btn btn-danger btn-flat btn-konfirmasi"><i class="fa fa-times"></i></a>
			            				@endif
			            				</td>
			            				@endcan
			            			</tr>
			            			@endforeach
			            		</tbody>
			            	</table>
		            	</div>
		            	<div class="pull-right">
							{!! $paket->links() !!}
						</div>
		            </div>
		        </div>
			</div>
		</div>
	</section>
</div>
<form id="frm-konfirmasi" action="" method="post">
	@csrf
	<input type="hidden" name="status" id="status">
</form>
@endsection
@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/lightbox/ekko-lightbox.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});
		$(document).on('click', '.btn-konfirmasi', function(e){
			e.preventDefault();
			var jawaban = confirm('Apakah anda yakin?');
            if (jawaban) {
            	var link = "{{ url('/') }}";
            	var status = $(this).data('status');
                var id = $(this).data('id');
                $('#frm-konfirmasi').attr('action', '{{ url('index/admin/transaksi/bayar-paket/konfirmasi/') }}/'+id);
                $('#status').val(status);
                $('#frm-konfirmasi').submit();
            }

		});
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	        event.preventDefault();
	        $(this).ekkoLightbox();
	    });
	});
</script>
@endpush