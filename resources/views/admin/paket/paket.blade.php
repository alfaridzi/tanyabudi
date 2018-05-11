@extends('admin.layout.app')
@section('title', 'Data Paket')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Paket
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-plane"></i> Paket</a></li>
	    <li class="active">Data Paket</li>
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
		            	@can('tambah paket haji umroh')
		            	<div class="pull-left">
		            		<a href="{{ url('index/admin/paket/tambah') }}" class="btn btn-primary btn-flat">Tambah Paket</a>
		            	</div>
		            	@endcan
		            	<div class="pull-right">
		            		{{-- <form method="get" class="form-inline" action="{{ url('index/admin/paket/search') }}">
		            			<div class="form-group">
		            				<input type="text" name="tanggal_mulai" class="form-control datepicker" placeholder="Tanggal Mulai">
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="tanggal_akhir" class="form-control datepicker" placeholder="Keberangkatan">
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="keberangkatan" class="form-control datepicker" placeholder="Keberangkatan">
		            			</div>
		            			<div class="form-group">
		            				<select class="form-control" name="kategori">
		            					<option selected="" disabled="">-- Pilih Kategori --</option>
		            					<option value="0">Haji</option>
		            					<option value="1">Umroh</option>
		            				</select>
		            			</div>
		            			<div class="form-group">
		            				<input type="search" name="search" class="form-control" placeholder="Cari...">
		            			</div>
		            			<div class="form-group">
		            				<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
		            			</div>
		            		</form> --}}
		            	</div>
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<td>No</td>
			            				<td>Nama Paket</td>
			            				<td>Harga</td>
			            				<td>Kategori</td>
			            				<td>Perjalanan</td>
			            				<td>Kuota</td>
			            				<td>Sekamar</td>
			            				<td>Keberangkatan</td>
			            				<td>Tanggal Mulai</td>
			            				<td>Tanggal Akhir</td>
			            				<td>Deskripsi Produk</td>
			            				<td>Status Paket</td>
			            				<td>Aksi</td>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@foreach($produk as $dataProduk)
			            			<tr>
			            				<td>{{ $loop->iteration }}</td>
			            				<td>{{ $dataProduk->nama }}</td>
			            				<td>Rp {{ number_format($dataProduk->harga, 2, ',', '.') }}</td>
			            				<td>{{ $dataProduk->type == '1' ? 'Haji' : 'Umroh' }}</td>
			            				<td>{{ $dataProduk->perjalanan }}</td>
			            				<td>{{ $dataProduk->kuota }}</td>
			            				<td>{{ $dataProduk->sekamar }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataProduk->keberangkatan) }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataProduk->tanggal_mulai) }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataProduk->tanggal_akhir) }}</td>
			            				<td>{{ $dataProduk->desc_prod }}</td>
			            				<td>{{ $dataProduk->status_paket == '0' ? 'Non Aktif' : 'Aktif' }}</td>
			            				<td>
			            				@can('edit paket haji umroh')
			            				<a href="{{ url('index/admin/paket/edit', $dataProduk->id) }}" class="btn btn-warning btn-flat">Edit</a> 
			            				@endcan
			            				@can('delete paket haji umroh')
			            				<a href="javascript:;" id="btn-delete-produk" class="btn btn-danger btn-flat">Delete</a>
			            				@endcan
			            				@can('status paket haji umroh')
			            				<a href="{{ url('index/admin/paket/status',$dataProduk->id) }}" onclick="return confirm('Apakah anda yakin ingin mengubah status data ini?')" class="btn btn-info btn-flat">Ganti Status</a>
			            				@endcan
			            				</td>
			            			</tr>
			            			@endforeach
			            		</tbody>
			            	</table>
			            	<div class="pull-right">
			            		{!! $produk->links() !!}
			            	</div>
		            	</div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<form id="frm-delete-produk" method="post" action="">
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
@endpush