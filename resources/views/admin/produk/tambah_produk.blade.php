@extends('admin.layout.app')
@section('title', 'Tambah Produk')
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
	    Tambah Produk
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-bookmark"></i> Produk</a></li>
	    <li class="active">Tambah Produk</li>
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
						<form method="post" action="{{ url('index/admin/produk/tambah/simpan') }}" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Tipe</label>
								<select class="form-control" name="tipe" required>
									<option selected="" disabled="">--Pilih Salah Satu</option>
									<option value="3">Wisata</option>
									<option value="4">Sedekah</option>
									<option value="5">Agen</option>
								</select>
							</div>
							<div class="form-group">
								<label>Nama Produk</label>
								<input type="text" name="nama_produk" class="form-control" required>
							</div>
							<div class="hide-input agen">
								<div class="form-group">
									<label>Harga</label>
									<input type="number" name="harga" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Deskripsi Produk</label>
								<textarea class="form-control" name="desc_prod" required></textarea>
							</div>
							<div class="hide-input">
								<div class="form-group">
									<label>Gambar</label>
									<div class="field-foto">
										<img src="" height="200" class="img-responsive" id="show-gambar">
									</div>
									<input type="file" name="gambar" id="gambar">
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-flat">Tambah</button>
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
		$('select[name="tipe"]').on('change', function(){
			var value = $(this).val();
			if(value == 5){
				$('.hide-input').hide();
				$('.agen').show();
				$('input[name="harga"]').attr('required', true);
			}else{
				$('.hide-input').hide();
				$('input[name="harga"]').attr('required', false);
			}
		});
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