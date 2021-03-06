@extends('admin.layout.app')
@section('title', 'List Jamaah')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    List Jamaah
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-suitcase"></i> Data Kloter</a></li>
	    <li class="active">List Jamaah</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-header">
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
		            	@if(Session::has('success'))
		            	<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong>{{ Session::get('success') }}</strong>
						</div>
		            	@endif
		            	@can('isi kuota')
		            	<div class="row">
			            	<div class="col-md-2 col-sm-12 col-xs-12">
			            		<a href="{{ url('index/admin/data-kloter/kloter/list-jamaah/'.$id_kloter.'/tambah') }}" class="btn btn-primary btn-flat">Isi Kuota</a>
			            	</div>
		            	</div>
		            	@endcan
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table id="table-list-jamaah" class="table">
								<thead>
									<tr>
										@can('delete kuota')
										<th class="no-sort"><input type="checkbox" name="deleteAll" id="deleteAll"></th>
										@endcan
										<th>No</th>
										<th>Nomor Paspor</th>
										<th>Nama Jamaah</th>
										<th>No HP</th>
										<th>Jenis Kelamin</th>
									</tr>
								</thead>
								<tbody>
									@foreach($kloter as $dataKloter)
									<tr>
										@can('delete kuota')
										<td><input type="checkbox" class="jamaah" value="{{ $dataKloter->id_jamaah }}"></td>
										@endcan
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataKloter->nomor_paspor }}</td>
										<td>{{ $dataKloter->nama_paspor }}</td>
										<td>{{ $dataKloter->no_hp_paspor }}</td>
										<td>
											@if($dataKloter->jenis_kelamin == '0')
											Perempuan
											@elseif($dataKloter->jenis_kelamin)
											Laki-laki
											@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							@can('delete kuota')
							<a href="javascript:;" class="btn btn-danger btn-flat disabled" id="btn-delete-jamaah">Delete Jamaah</a>
							@endcan
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-jamaah" action="{{ url('index/admin/data-kloter/kloter/list-jamaah/'.$id_kloter.'/delete') }}" method="post">
	@csrf
	{!! method_field('delete') !!}
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

		$(document).on('click', '#deleteAll', function(){
			var isExists = $("#table-list-jamaah .jamaah").find();
			if ($(this).is(':checked')) {
				if (isExists.prevObject.length != 0) {
					$('.jamaah').prop('checked', true);
					$('#btn-delete-jamaah').removeClass('disabled');	
				}
			}else{
				$('.jamaah').prop('checked', false);
				$('#btn-delete-jamaah').addClass('disabled');
			}
		});


		$(".jamaah").on('change',function(){
			if($(this).is(':checked')){
				$('#btn-delete-jamaah').removeClass('disabled');
			}else{
				if (!$('.jamaah').is(':checked')) {
					$('#btn-delete-jamaah').addClass('disabled');
				}
			}
		});

		$(document).on('click', '#btn-delete-jamaah', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data jamaah?');

            if (jawaban) {
                var jamaah = $("#table-list-jamaah .jamaah:checked").map(function(){
			      return $(this).val();
			    }).get();
			    $('#tampungJamaah').val(jamaah);
			    $('#frm-delete-jamaah').submit();
            }
        });
	});
</script>
@endpush