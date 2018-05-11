@extends('admin.layout.app')
@section('title', 'Buat Transaksi')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<style type="text/css">
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
	    Buat Transaksi
	  </h1>
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
		            	<form method="post" action="{{ url('index/admin/kwitansi/buat-transaksi/simpan') }}">
		            		@csrf
		            		<div class="form-group">
		            			<label>Nama Pelanggan</label>
		            			<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Tipe Produk</label>
		            			<select class="form-control" name="tipe_produk" id="tipe_produk" required>
		            				<option selected="" disabled="">--Pilih Tipe Produk--</option>
		            				<option value="1">Haji</option>
		            				<option value="2">Umroh</option>
		            				<option value="3">Wisata</option>
		            				<option value="4">Sedekah</option>
		            				<option value="5">Bayar Paket</option>
		            			</select>
		            		</div>
		            		<div class="form-group hide-produk">
		            			<label>Produk</label>
		            			<select class="form-control" name="produk" id="produk" required>
		            				<option selected="" disabled="">--Pilih Produk</option>
		            			</select>
		            		</div>
		            		<div class="form-group hide-user">
		            			<label>User</label>
		            			<select class="form-control" name="user" id="user">
		            				<option selected="" disabled="">--Pilih User</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Jumlah Bayar</label>
		            			<input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar">
		            		</div>
		            		<div class="form-group">
		            			<label>Status</label><br>
		            			<label class="radio-inline">
		            				<input type="radio" name="status" value="0" required>Pending 
		            			</label>
		            			<label class="radio-inline">
		            				<input type="radio" name="status" value="1">Lunas
		            			</label>
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
<script type="text/javascript" src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
	$('#produk').select2();
	$('#user').select2();

	$('#tipe_produk').on('change', function(){
		var value = $(this).val();
		var link = "{{ url('/') }}";
		if (value == 5) {
			$('.hide-produk').hide();
			$('.hide-user').show();
			$('#user').prop('required', true);
			$('#produk').prop('required', false);

			$('#user').empty();
			$('#user').append('<option>--Mohong Tunggu--</option>');
			var tipe_produk = $(this).val();
			var link = link + '/index/admin/ajax/get_user/'+ tipe_produk;
			$.ajax({
				url: link,
				method: 'GET',
				data: '',
				success: function(data) {
					console.log(data.options);
					$("#user").html('');
					$("#user").html(data.options);
				}
		    });
		}else{
			$('.hide-produk').show();
			$('#produk').prop('required', true);
			$('#user').prop('required', false);

			$('#produk').empty();
			$('#produk').append('<option>--Mohong Tunggu--</option>');
			var tipe_produk = $(this).val();
			var link_produk = link + '/index/admin/ajax/get_produk/'+tipe_produk;
			var link_user = link + '/index/admin/ajax/get_user/'+tipe_produk;
			$.ajax({
				url: link_produk,
				method: 'GET',
				data: '',
				success: function(data) {
					console.log(data.options);
					$("#produk").html('');
					$("#produk").html(data.options);
				}
		    });

		    $.ajax({
				url: link_user,
				method: 'GET',
				data: '',
				success: function(data) {
					console.log(data.options);
					$("#user").html('');
					$("#user").html(data.options);
				}
		    });
		}
	});
</script>
@endpush