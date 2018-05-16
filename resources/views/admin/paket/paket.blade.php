@extends('admin.layout.app')
@section('title', 'Data Paket')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<style type="text/css">
	#gambar-produk {
		max-width: 400px;
	}
	#gambar-travel {
		max-width: 100px;
		max-height: 100px;
	}
</style>
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
		            		<form method="get" class="form-inline" action="{{ url('index/admin/paket/search') }}">
		            			<div class="form-group">
		            				<select class="form-control" name="status_paket">
		            					<option selected="" disabled="">--Status Paket--</option>
		            					<option value="0">Aktif</option>
		            					<option value="1">Tidak Aktif</option>
		            				</select>
		            			</div>
		            			<div class="form-group">
		            				<select class="form-control" name="kategori">
		            					<option selected="" disabled="">-- Pilih Kategori --</option>
		            					<option value="0">Haji</option>
		            					<option value="1">Umroh</option>
		            				</select>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="tanggal_mulai" class="form-control datepicker" placeholder="Tanggal Mulai">
		            			</div>
		            			<div class="form-group">
		            				<input type="text" name="tanggal_akhir" class="form-control datepicker" placeholder="Tanggal Akhir">
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
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<td>No</td>
			            				<td>Nama Paket</td>
			            				<td>Harga</td>
			            				<td>Kategori</td>
			            				<td>Kuota</td>
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
			            				<td>{{ $dataProduk->kuota }}</td>
			            				<td>{{ $dataProduk->status_paket == '0' ? 'Non Aktif' : 'Aktif' }}</td>
			            				<td>
			            				@can('edit paket haji umroh')
			            				<a href="{{ url('index/admin/paket/edit', $dataProduk->id) }}" class="btn btn-warning btn-flat">Edit</a> 
			            				@endcan
			            				@can('delete paket haji umroh')
			            				<a href="javascript:;" id="btn-delete-produk" class="btn btn-danger btn-flat">Delete</a>
			            				@endcan
			            				<a href="javascript:;" id="btn-detail-produk" class="btn btn-info btn-flat" data-id-paket="{{ $dataProduk->id }}" 
			            					data-kategori = "{{ $dataProduk->type }}"
			            					data-gambar-produk = "{{ $dataProduk->gambar }}"
			            					data-gambar-travel = "{{ $dataProduk->gambar_travel }}"
			            					data-desc-produk = "{{ $dataProduk->desc_prod }}"
			            					data-perjalanan="{{ $dataProduk->perjalanan }}" 
			            					data-sekamar="{{ $dataProduk->sekamar }}" 
			            					data-keberangkatan="{{ Tanggal::tanggalIndonesia($dataProduk->keberangkatan) }}" 
			            					data-tanggal-mulai="{{ Tanggal::tanggalIndonesia($dataProduk->tanggal_mulai) }}" 
			            					data-tanggal-akhir="{{ Tanggal::tanggalIndonesia($dataProduk->tanggal_akhir) }}">Detail</a>
			            				@can('status paket haji umroh')
			            				<a href="{{ url('index/admin/paket/status',$dataProduk->id) }}" onclick="return confirm('Apakah anda yakin ingin mengubah status data ini?')" class="btn btn-success btn-flat">Ganti Status</a>
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
<!-- Modal -->
<div class="modal fade" id="modal-detail-produk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Produk</h4>
      </div>
      <div class="modal-body">
        <ul>
        	<li>Keberangkatan: <span id="keberangkatan"></span></li>
        	<li>Tanggal Mulai: <span id="tanggal-mulai"></span></li>
        	<li>Tanggal Akhir: <span id="tanggal-akhir"></span></li>
        	<li>Perjalanan: <span id="perjalanan"></span></li>
        	<li>Sekamar: <span id="sekamar"></span></li>
        	<li>Gambar Produk: <br><img src="" id="gambar-produk"></li>
        	<li>Gambar Travel: <br><img src="" id="gambar-travel"></li>
        	<li>Deskripsi Produk: <p id="desc-prod"></p></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
		$(document).on('click', '#btn-detail-produk', function(){
			$('#modal-detail-produk').modal('show');
			var keberangkatan = $(this).data('keberangkatan');
			var tanggal_mulai = $(this).data('tanggal-mulai');
			var tanggal_akhir = $(this).data('tanggal-akhir');
			var perjalanan = $(this).data('perjalanan');
			var desc_prod = $(this).data('desc-produk');
			var sekamar = $(this).data('sekamar');
			var gambar_travel = $(this).data('gambar-travel');
			var gambar_produk = $(this).data('gambar-produk');
			var kategori = $(this).data('kategori');

			$('span#keberangkatan').text(keberangkatan);
			$('span#tanggal-mulai').text(tanggal_mulai);
			$('span#tanggal-akhir').text(tanggal_akhir);
			$('span#perjalanan').text(perjalanan);
			$('span#sekamar').text(sekamar);
			$('p#desc-prod').text(desc_prod);
			if (gambar_produk == "") {
			    src: "";
			}else{
				if (kategori == '1') {
					$('img#gambar-produk').attr({
						src: "{{ asset('assets/images/paket/haji') }}" + '/' + gambar_produk
					});
				}else if(kategori == '2') {
					$('img#gambar-produk').attr({
						src: "{{ asset('assets/images/paket/umroh') }}" + '/' + gambar_produk
					});
				}
			}
			if (gambar_travel == "") {
			    src: "";
			}else{
				$('img#gambar-travel').attr({
					src: "{{ asset('admin/images/logo_travel') }}" + '/' + gambar_travel
				});
			}
		});
	});
</script>
@endpush