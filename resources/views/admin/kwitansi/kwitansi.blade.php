@extends('admin.layout.app')
@section('title', 'Data Kwitansi')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Kwitansi
	  </h1>
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
		            	@can('buat transaksi')
		            	<a href="{{ url('index/admin/kwitansi/buat-transaksi') }}" class="btn btn-primary btn-flat">Buat Transaksi</a>
		            	@endcan
					</div>
		            <div class="box-body">
		            	<div class="table-responsive">
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<th>No</th>
			            				<th>Nomor Transaksi</th>
			            				<th>Nomor Kwitansi</th>
			            				<th>Pelanggan</th>
			            				<th>Metode Bayar</th>
			            				<th>Jumlah Bayar</th>
			            				<th>Admin Penginput</th>
			            				<th>Status</th>
			            				<th>Aksi</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@foreach($kwitansi as $dataKwitansi)
			            			<tr>
			            				<td>{{ $loop->iteration }}</td>
			            				<td>{{ $dataKwitansi->id_transaksi }}</td>
			            				<td>{{ $dataKwitansi->nomor_kwitansi }}</td>
			            				<td>{{ $dataKwitansi->pelanggan }}</td>
			            				<td>
			            					@if($dataKwitansi->metode_bayar == 0)
			            					Offline
			            					@elseif($dataKwitansi->metode_bayar == 1)
			            					Online
			            					@endif
			            				</td>
			            				<td>Rp {{ number_format($dataKwitansi->jumlah, 2, ',', '.') }}</td>
			            				<td>{{ $dataKwitansi->admin_penginput }}</td>
			            				<td>
			            					@if($dataKwitansi->status == 1)
			            					Lunas
			            					@elseif($dataKwitansi->status == 0)
			            					Pending
			            					@endif
			            				</td>
			            				<td>
			            					@can('edit kwitansi')
			            					@if($dataKwitansi->metode_bayar == 0)
			            					<a href="{{ url('index/admin/kwitansi/edit', $dataKwitansi->id_kwitansi) }}"></a>
			            					@endif
			            					@endcan
			            					@can('ubah status kwitansi')
			            					<a href="javascript:;" id="btn-ubah-status" data-id="{{ $dataKwitansi->id_kwitansi }}" class="btn btn-success btn-flat">Ubah Status</a>
			            					@endcan
			            				</td>
			            			</tr>
			            			@endforeach
			            		</tbody>
			            	</table>
		            	</div>
		            	<div class="pull-right">
							{!! $kwitansi->links() !!}
						</div>
		            </div>
		        </div>
			</div>
		</div>
	</section>
</div>
<form id="frm-ubah-status" action="" method="post">
	@csrf
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-ubah-status', function(e){
			e.preventDefault();
			var jawaban = confirm('Apakah anda yakin?');
            if (jawaban) {
            	var link = "{{ url('/') }}";
                var id = $(this).data('id');
                $('#frm-ubah-status').attr('action', '{{ url('index/admin/kwitansi/status') }}/'+id);
                $('#frm-ubah-status').submit();
            }

		});
	});
</script>
@endpush