@extends('admin.layout.app')
@section('title', 'Edit Paspor')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Edit Paspor
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-plane"></i> Data Booking</a></li>
	    <li class="active">Edit Paspor</li>
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
		            	<form method="post" action="{{ url('index/admin/data-booking/paspor/update', $paspor->id_paspor) }}">
		            		@csrf
		            		{!! method_field('patch') !!}
		            		<div class="form-group">
	            				<label>Nomor Paspor</label>
	            				<input type="text" class="form-control" name="nomor_paspor" placeholder="Nomor Paspor" value="{{ $paspor->nomor_paspor }}" required>
		            		</div>
		            		<div class="form-group">
	            				<label>Nama</label>
	            				<input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $paspor->nama_paspor }}" required>
		            		</div>
		            		<div class="form-group">
	            				<label>Jenis Kelamin</label><br>
	            				<label class="radio-inline">
	            					<input type="radio" name="jenis_kelamin" value="0" {{ Pemilihan::selected($paspor->jenis_kelamin, '0', 'checked') }}>Perempuan
	            				</label>
	            				<label class="radio-inline">
	            					<input type="radio" name="jenis_kelamin" value="1" {{ Pemilihan::selected($paspor->jenis_kelamin, '1', 'checked') }}>Laki-Laki
	            				</label>
		            		</div>
		            		<div class="form-group">
		            			<label>Tempat Lahir</label>
		            			<input type="text" class="form-control" name="tempat_lahir" value="{{ $paspor->tempat_lahir }}" placeholder="Tempat Lahir" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Tanggal Lahir</label>
		            			<input type="text" class="form-control datepicker" value="{{ $paspor->tanggal_lahir }}" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
		            		</div>
		            		<div class="form-group">
	            				<label>Nomor HP</label>
	            				<input type="text" class="form-control" name="nomor_hp" value="{{ $paspor->no_hp_paspor }}" placeholder="Nomor HP" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Provinsi</label>
		            			<select class="form-control" name="provinsi" id="provinsi" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				@foreach($provinsi as $dataProvinsi)
		            				<option value="{{ $dataProvinsi->id }}" {{ $dataProvinsi->id == $paspor->provinsi ? 'selected' : '' }}>{{ $dataProvinsi->name }}</option>
		            				@endforeach
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Kabupaten/Kota</label>
		            			<select class="form-control" name="kota" id="kota" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				@if(!is_null($paspor->kota))
		            				@foreach($kota as $dataKota)
		            				<option value="{{ $dataKota->id }}" {{ $dataKota->id == $paspor->kota ? 'selected' : '' }}>{{ $dataKota->name }}</option>
		            				@endforeach
		            				@endif
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Kecamatan</label>
		            			<select class="form-control" name="kecamatan" id="kecamatan" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				@if(!is_null($paspor->kecamatan))
		            				@foreach($kecamatan as $dataKecamatan)
		            				<option value="{{ $dataKecamatan->id }}" {{ $dataKecamatan->id == $paspor->kecamatan ? 'selected' : '' }}>{{ $dataKecamatan->name }}</option>
		            				@endforeach
		            				@endif
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Desa/Kelurahan</label>
		            			<select class="form-control" name="kelurahan" id="kelurahan" required>
		            				<option selected="" disabled="">--Pilih Salah Satu--</option>
		            				@if(!is_null($paspor->kelurahan))
		            				@foreach($kelurahan as $dataKelurahan)
		            				<option value="{{ $dataKelurahan->id }}" {{ $dataKelurahan->id == $paspor->kelurahan ? 'selected' : '' }}>{{ $dataKelurahan->name }}</option>
		            				@endforeach
		            				@endif
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<label>Alamat</label>
		            			<textarea class="form-control" name="alamat" placeholder="Alamat" required>{{ $paspor->alamat }}</textarea>
		            		</div>
		            		<div class="form-group">
		            			<label>Tanggal Issued</label>
		            			<input type="text" class="form-control datepicker" value="{{ $paspor->tanggal_issued }}" name="tanggal_issued" placeholder="Tanggal Issued" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Tanggal Expired</label>
		            			<input type="text" class="form-control datepicker" value="{{ $paspor->tanggal_expired }}" name="tanggal_expired" placeholder="Tanggal Expired" required>
		            		</div>
		            		<div class="form-group">
		            			<label>Keterangan</label>
		            			<textarea class="form-control" name="keterangan" placeholder="Keterangan">{{ $paspor->keterangan }}</textarea>
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