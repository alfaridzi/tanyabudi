@extends('admin.layout.app')
@section('title', 'Tambah Karyawan')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Tambah Karyawan
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-user"></i> Karyawan</a></li>
	    <li class="active">Tambah Karyawan</li>
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
		            	<form method="post" action="{{ url('index/admin/karyawan/tambah/simpan') }}">
		            		@csrf
		            		<div class="form-group">
	            				<label>NIK</label>
	            				<input type="text" class="form-control" name="nik" placeholder="Nomor NIK" required>
		            		</div>
		            		<div class="form-group">
	            				<label>Nama</label>
	            				<input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" required>
		            		</div>
		            		<div class="form-group">
	            				<label>Jenis Kelamin</label><br>
	            				<label class="radio-inline">
	            					<input type="radio" name="jenis_kelamin" value="0">Perempuan
	            				</label>
	            				<label class="radio-inline">
	            					<input type="radio" name="jenis_kelamin" value="1">Laki-Laki
	            				</label>
		            		</div>
		            		<div class="form-group">
		            			<label>Divisi</label>
		            			<select class="form-control" name="divisi" id="divisi" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				@foreach($divisi as $dataDivisi)
		            				<option value="{{ $dataDivisi->kode_divisi }}">{{ $dataDivisi->nama_divisi }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Jabatan</label>
		            			<select class="form-control" name="jabatan" id="jabatan" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Tanggal Bergabung</label>
		            			<input type="text" class="form-control datepicker" name="tanggal_bergabung" placeholder="Tanggal Bergabung" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Tempat Lahir</label>
		            			<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
		            		</div>

		            		<div class="form-group">
		            			<label>Tanggal Lahir</label>
		            			<input type="text" class="form-control datepicker" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
		            		</div>
		            		<div class="form-group">
	            				<label>Nomor HP</label>
	            				<input type="text" class="form-control" name="no_hp" placeholder="Nomor HP">
		            		</div>
		            		<div class="form-group">
	            				<label>Nomor Telepon Rumah</label>
	            				<input type="text" class="form-control" name="no_telp_rumah" placeholder="Nomor Telepon Rumah">
		            		</div>
		            		<div class="form-group">
	            				<label>Email</label>
	            				<input type="email" class="form-control" name="email" placeholder="Email">
		            		</div>
		            		<div class="form-group">
		            			<label>Provinsi</label>
		            			<select class="form-control" name="provinsi" id="provinsi">
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				@foreach($provinsi as $dataProvinsi)
		            				<option value="{{ $dataProvinsi->id }}">{{ $dataProvinsi->name }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Kabupaten/Kota</label>
		            			<select class="form-control" name="kota" id="kota">
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Kecamatan</label>
		            			<select class="form-control" name="kecamatan" id="kecamatan">
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Desa/Kelurahan</label>
		            			<select class="form-control" name="kelurahan" id="kelurahan">
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Alamat</label>
		            			<textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
		            		</div>
		            		<div class="form-group">
		            			<label>Kode POST</label>
		            			<input type="text" name="kode_pos" class="form-control" placeholder="Kode POS">
		            		</div>
		            		<div class="form-group">
	            				<label>Status</label><br>
	            				<label class="radio-inline">
	            					<input type="radio" name="status" value="0">Tidak Aktif
	            				</label>
	            				<label class="radio-inline">
	            					<input type="radio" name="status" value="1">Aktif
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});

		$('#divisi').on('change', function(){
			var link = "{{ url('/') }}";
			$('#jabatan').empty();
			$('#jabatan').append('<option>--Mohong Tunggu--</option>');
			var kode_divisi = $(this).val();
			var link = link + '/index/admin/ajax/get_jabatan/'+kode_divisi;
			$.ajax({
				url: link,
				method: 'GET',
				data: '',
				success: function(data) {
					console.log(data.options);
					$("#jabatan").html('');
					$("#jabatan").html(data.options);
				}
		    });
		});

		$('#provinsi').on('change', function(){
			var link = "{{ url('/') }}";
			$('#kota').empty();
			$('#kota').append('<option>--Mohong Tunggu--</option>');
			var id = $(this).val();
			var link = link + '/index/admin/ajax/get_kota/'+id;
			$.ajax({
				url: link,
				method: 'GET',
				data: '',
				success: function(data) {
					console.log(data.options);
					$("#kota").html('');
					$("#kota").html(data.options);
				}
		    });
		});

		$('#kota').on('change', function(){
			var link = "{{ url('/') }}";
			$('#kecamatan').empty();
			$('#kecamatan').append('<option>--Mohong Tunggu--</option>');
			var id = $(this).val();
			var link = link + '/index/admin/ajax/get_kecamatan/'+id;
			$.ajax({
				url: link,
				method: 'GET',
				data: '',
				success: function(data) {
					console.log(data.options);
					$("#kecamatan").html('');
					$("#kecamatan").html(data.options);
				}
		    });
		});

		$('#kecamatan').on('change', function(){
			var link = "{{ url('/') }}";
			$('#kelurahan').empty();
			$('#kelurahan').append('<option>--Mohong Tunggu--</option>');
			var id = $(this).val();
			var link = link + '/index/admin/ajax/get_kelurahan/'+id;
			$.ajax({
				url: link,
				method: 'GET',
				data: '',
				success: function(data) {
					console.log(data.options);
					$("#kelurahan").html('');
					$("#kelurahan").html(data.options);
				}
		    });
		});
	});
</script>
@endpush