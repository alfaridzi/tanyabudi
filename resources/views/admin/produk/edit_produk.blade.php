@extends('admin.layout.app')
@section('title', 'Edit Produk')
@push('css')
<style type="text/css">
	#show-gambar {
		max-height: 200px;
	}
</style>
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Edit Produk
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-bookmark"></i> Produk</a></li>
	    <li class="active">Edit Produk</li>
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
						<form method="post" action="{{ url('index/admin/produk/update', $produk->id) }}" enctype="multipart/form-data">
							@csrf
							{!! method_field('patch') !!}
							<div class="form-group">
								<label>Nama Produk</label>
								<input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama }}" required>
							</div>
							<div class="hide-input agen">
								<div class="form-group">
									<label>Harga</label>
									<input type="number" name="harga" class="form-control" value="{{ $produk->harga }}" required>
								</div>
							</div>
							<div class="form-group">
								<label>Deskripsi Produk</label>
								<textarea class="form-control" name="desc_prod" required>{{ $produk->desc_prod }}</textarea>
							</div>
							<div class="hide-input">
								<div class="form-group">
									<label>Gambar</label>
									<div class="field-foto">
										<img src="{{ asset('assets/images/paket/wisata/'.$produk->gambar) }}" height="200" class="img-responsive" id="show-gambar">
										<img src="" height="200" class="img-responsive" id="show-gambar">
									</div>
									<input type="file" name="gambar" id="gambar">
								</div>
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
<script type="text/javascript">
	$(document).ready(function(){
		var tipe = '{{ $produk->type }}';
		if(value == 5){
			$('.hide-input').hide();
			$('.agen').show();
			$('input[name="harga"]').prop('required', true);
			$('input[name="gambar"]').prop('required', false);
		}else if(value == 3){
			$('.hide-input').show();
			$('.agen').show();
			$('input[name="harga"]').prop('required', true);
			$('input[name="gambar"]').prop('required', true);
		}else{
			$('.hide-input').hide();
			$('input[name="harga"]').prop('required', false);
			$('input[name="gambar"]').prop('required', false);
		}
	});
</script>
<script type="text/javascript">
    function readUploadImagemember(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show-gambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#gambar").change(function () {
        readUploadImagemember(this);
    });
</script>
@endpush