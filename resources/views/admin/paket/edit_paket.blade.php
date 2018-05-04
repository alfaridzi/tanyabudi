@extends('admin.layout.app')
@section('title', 'Edit Paket')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<style type="text/css">
	#show-gambar {
		max-height: 200px;
	}
	#show-gambar-travel {
		max-height: 100px;
	}
	span.note {
		font-size: 11px;
		color: red;
	}
</style>
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Edit Paket
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-plane"></i> Paket</a></li>
	    <li class="active">Edit Paket</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-body">
		            	@if($errors->any())
							<div class="alert alert-danger alert-dismissible" role="alert">
							  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  	<ul>
							  		@foreach($errors->all() as $error)
							  		<li>{{ $error }}</li>
							  		@endforeach
							  	</ul>
							</div>
						@endif
						<form method="post" action="{{ url('index/admin/paket/update', $produk->id_produk) }}" enctype="multipart/form-data">
							@csrf
							{!! method_field('patch') !!}
							<div class="form-group">
								<label>Nama Paket</label>
								<input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" value="{{ $produk->nama }}" required>
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="number" name="harga" class="form-control" placeholder="Harga" value="{{ $produk->harga }}" required>
							</div>
							<div class="form-group">
								<label>Deskripsi Paket</label>
								<textarea class="form-control" name="deskripsi_paket" placeholder="Deskripsi Paket" required>{{ $produk->desc_prod }}</textarea>
							</div>
							<div class="form-group">
								<label>Gambar</label>
								<div class="field-foto">
									@if($produk->type == '1')
									<img src="{{ asset('assets/images/paket/haji/'.$produk->gambar) }}" height="200" class="img-responsive" id="show-gambar">
									@elseif($produk->type == '2')
									<img src="{{ asset('assets/images/paket/umroh/'.$produk->gambar) }}" height="200" class="img-responsive" id="show-gambar">
									@endif
								</div>
								<input type="file" name="gambar" id="gambar">
								<span class="note">*Harap memasukkan file gambar dengan dimensi minimal 500x300</span>
							</div>
							<hr>
							<div class="form-group">
								<label>Kategori</label><br>
								<label class="radio-inline">
									<input type="radio" name="kategori" value="1" required {{ Pemilihan::selected($produk->type,'1','checked') }}>Haji
								</label>
								<label class="radio-inline">
									<input type="radio" name="kategori" value="2" {{ Pemilihan::selected($produk->type,'2','checked') }}>Umroh
								</label>
							</div>
							<div class="form-group">
								<label>Nama Travel</label>
								<input type="text" name="nama_travel" class="form-control" placeholder="Nama Travel" value="{{ $produk->nama_travel }}">
							</div>
							<div class="form-group">
								<label>ID Travel</label>
								<input type="text" name="id_travel" class="form-control" placeholder="ID Travel" value="{{ $produk->id_travel }}">
							</div>
							<div class="form-group">
								<label>Gambar Travel</label>
								<div class="field-gambar-travel">
									<img src="{{ asset('admin/images/logo_travel/'.$produk->gambar_travel) }}" height="100" class="img-responsive" id="show-gambar-travel">
								</div>
								<input type="file" name="gambar_travel" id="gambar_travel">
								<span class="note">*Harap memasukkan file gambar dengan dimensi minimal 150x150</span>
							</div>
							<div class="form-group">
								<label>Perjalanan</label>
								<input type="text" name="perjalanan" value="{{ $produk->perjalanan }}" class="form-control" placeholder="Perjalanan">
							</div>
							<div class="form-group">
								<label>Kuota</label>
								<input type="numeric" name="kuota" value="{{ $produk->kuota }}" class="form-control" placeholder="Kuota" required>
							</div>
							<div class="form-group">
								<label>Sekamar</label>
								<input type="text" name="sekamar" value="{{ $produk->sekamar }}" class="form-control" placeholder="Sekamar">
							</div>
							<div class="form-group">
								<label>Keberangkatan</label>
								<input type="text" name="keberangkatan" value="{{ $produk->keberangkatan }}" class="form-control datepicker" placeholder="Keberangkatan">
							</div>
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="text" name="tanggal_mulai" value="{{ $produk->tanggal_mulai }}" class="form-control datepicker" placeholder="Tanggal Mulai">
							</div>
							<div class="form-group">
								<label>Tanggal Akhir</label>
								<input type="text" name="tanggal_akhir" value="{{ $produk->tanggal_akhir }}" class="form-control datepicker" placeholder="Tanggal Akhir">
							</div>
							<button type="submit" class="btn btn-primary btn-flat">Edit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
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
	});
</script>
<script type="text/javascript">
    function readUploadImagemember(input, output) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(output).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#gambar").change(function () {
        readUploadImagemember(this, '#show-gambar');
    });

    $("#gambar_travel").change(function () {
        readUploadImagemember(this, '#show-gambar-travel');
    });

</script>
@endpush