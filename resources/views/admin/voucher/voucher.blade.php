@extends('admin.layout.app')
@section('title', 'Data Voucher')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Voucher
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-ticket"></i> Voucher</a></li>
	    <li class="active">Data Voucher</li>
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
		            	<a href="{{ url('index/admin/voucher/tambah') }}" class="btn btn-primary btn-flat">Tambah Voucher</a>
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Voucher</th>
										<th>Pemilik</th>
										<th>Kategori</th>
										<th>Nama Voucher</th>
										<th>Nominal</th>
										<th>Tanggal</th>
										<th>Countdown</th>
										<th>Status Expired</th>
										<th>Status Voucher</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($voucher as $dataVoucher)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataVoucher->kode_voucher }}</td>
										<td>{{ $dataVoucher->pemilik }}</td>
										<td>
											@if($dataVoucher->kategori == 1)
											Haji
											@elseif($dataVoucher->kategori == 2)
											Umroh
											@elseif($dataVoucher->kategori == 3)
											Wisata
											@endif
										</td>
										<td>{{ $dataVoucher->nama_voucher }}</td>
										<td>Rp {{ number_format($dataVoucher->nominal, 2, ',', '.') }}</td>
										<td>ASAP</td>
										<td>{{ Tanggal::tanggalIndonesia($dataVoucher->tanggal_mulai) }} s.d {{ Tanggal::tanggalIndonesia($dataVoucher->tanggal_akhir) }}</td>
										<td>{{ $dataVoucher->status_expired == 0 ? 'Belum Expired' : 'Expired' }}</td>
										<td>{{ $dataVoucher->status_voucher == 0 ? 'Belum Terpakai' : 'Terpakai' }}</td>
										<td><a href="{{ url('index/admin/voucher/edit', $dataVoucher->id_voucher
										) }}" class="btn btn-warning btn-flat">Edit</a> <a href="javascript:;" id="btn-delete-voucher" data-id-voucher="{{ $dataVoucher->id_voucher }}" class="btn btn-danger btn-flat">Delete</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $voucher->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<form id="frm-delete-voucher" action="" method="post">
	@csrf
	{!! method_field('delete') !!}
</form>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#btn-delete-voucher', function(e){
            e.preventDefault();
            var jawaban = confirm('Apakah anda yakin ingin menghapus data ini?');

            if (jawaban) {
                var id_voucher = $(this).data('id-voucher');
                $('#frm-delete-voucher').attr('action', '{{ url('index/admin/voucher/delete') }}/'+id_voucher);
                $('#frm-delete-voucher').submit();
            }
        });
	});
</script>
@endpush