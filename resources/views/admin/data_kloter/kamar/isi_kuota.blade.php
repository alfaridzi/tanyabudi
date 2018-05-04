@extends('admin.layout.app')
@section('title', 'Isi Kuota')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Isi Kuota
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Kloter</a></li>
	    <li class="active">Isi Kuota</li>
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
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table id="table-list-jamaah" class="table">
								<thead>
									<tr>
										<th class="no-sort"></th>
										<th>No</th>
										<th>Nomor Paspor</th>
										<th>Nama Jamaah</th>
										<th>No HP</th>
										<th>Jenis Kelamin</th>
									</tr>
								</thead>
								<tbody>
									@foreach($kamar as $dataKamar)
									<tr>
										<td><input type="checkbox" class="jamaah" value="{{ $dataKamar->id_jamaah }}"></td>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataKamar->nomor_paspor }}</td>
										<td>{{ $dataKamar->nama_paspor }}</td>
										<td>{{ $dataKamar->no_hp_paspor }}</td>
										<td>
											@if($dataKamar->jenis_kelamin == '0')
											Perempuan
											@elseif($dataKamar->jenis_kelamin)
											Laki-laki
											@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<a href="javascript:;" class="btn btn-primary btn-flat disabled" id="btn-isi-kuota">Isi Kuota</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-isi-kuota" action="{{ url('index/admin/data-kloter/kamar/list-jamaah/'.$id_kamar.'/tambah/simpan') }}" method="post">
	@csrf
	<input type="hidden" name="tampungJamaah" id="tampungJamaah">
</form>
@endsection
@push('js')
<script src="{{ asset('admin/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#table-list-jamaah').DataTable({
			"order": [],
			"columnDefs": [{
	          "targets": 'no-sort',
	          "orderable": false,
	        }]
		});

		var hitung = "{{ $seat }}";
		$(document).on('click', '.jamaah', function(e){
			if ($(this).is(':checked')) {
				hitung -= 1;
				if (hitung < 0) {
					hitung += 1;
					alert('Tidak bisa menambahkan jamaah lagi');
					$(this).prop('checked', false);
					$('#btn-isi-kuota').addClass('disabled');
				}else{
					$('#btn-isi-kuota').removeClass('disabled');
				}
			}else{
				hitung += 1;
				if (!$('.jamaah').is(':checked')) {
					$('#btn-isi-kuota').addClass('disabled');
				}
			}
		});

		$(document).on('click', '#btn-isi-kuota', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menambahkan jamaah ke kamar ini?');

            if (jawaban) {
            	var jamaah = $("#table-list-jamaah .jamaah:checked").map(function(){
			      return $(this).val();
			    }).get();
                $('#tampungJamaah').val(jamaah);
                $('#frm-isi-kuota').submit();
            }
        });
	});
</script>
@endpush