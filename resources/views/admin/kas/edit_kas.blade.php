@extends('admin.layout.app')
@section('title', 'Edit Kas')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
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
	    Edit Kas
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-book"></i> Report</a></li>
	    <li>Data Kas</li>
	    <li class="active">Edit Kas</li>
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
						<form method="post" action="{{ url('index/admin/kas/update', $kas->id_kas) }}" enctype="multipart/form-data">
							@csrf
							{!! method_field('patch') !!}
							<div class="form-group">
								<label>Nomor Bukti</label>
								<input type="text" name="nomor_bukti" class="form-control" placeholder="Nama Bukti" value="{{ $kas->nomor_bukti }}" required>
							</div>
							<div class="form-group">
								<label>Kode Kantor</label>
								<select class="form-control" name="kode_kantor" id="kode_kantor" required>
									<option disabled="" selected="">--Pilih Kode Kantor--</option>
									@foreach($jabatan as $dataJabatan)
									<option value="{{ $dataJabatan->kode_cabang }}" {{ Pemilihan::selected($kas->kode_kantor, $dataJabatan->kode_cabang, 'selected') }}>{{ $dataJabatan->kode_cabang }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal Transaksi</label>
								<input type="text" name="tanggal_transaksi" class="form-control datepicker" placeholder="Tanggal Transaksi" value="{{ $kas->tanggal_transaksi }}" required>
							</div>
							<div class="form-group">
								<label>Bukti</label>
								<div class="field-foto">
									<img src="{{ asset('admin/images/kas/'.$kas->bukti) }}" height="200" class="img-responsive" id="show-gambar">
								</div>
								<input type="file" name="bukti" id="gambar">
							</div>
							<div class="form-group">
								<label>Tipe</label><br>
								<label class="radio-inline">
									<input type="radio" name="tipe" value="0" required {{ Pemilihan::selected($kas->tipe, '0', 'checked') }}>Credit
								</label>
								<label class="radio-inline">
									<input type="radio" name="tipe" value="1" {{ Pemilihan::selected($kas->tipe, '1', 'checked') }}>Debit
								</label>
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea name="keterangan" placeholder="Keterangan" class="form-control">{{ $kas->keterangan }}</textarea>
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
<script type="text/javascript" src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});
		$('#kode_kantor').select2();
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

</script>
@endpush