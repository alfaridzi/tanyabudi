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
		            	<div class="pull-left">
		            		<a href="{{ url('index/admin/voucher/tambah') }}" class="btn btn-primary btn-flat">Tambah Voucher</a>
		            	</div>
		            	<div class="pull-right">
		            		<form method="get" class="form-inline" action="{{ url('index/admin/voucher/search') }}">
		            			<div class="form-group">
		            				<input type="search" name="search" class="form-control" placeholder="Cari...">
		            			</div>
		            			<div class="form-group">
		            				<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
		            			</div>
		            		</form>
		            	</div>
		            </div>
		            <div class="box-body">
		            	<div class="table-responsive">
							<table class="table table-bordered" id="table-voucher">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Voucher</th>
										<th>Pemilik</th>
										<th>Kategori</th>
										<th>Nama Voucher</th>
										<th>Nominal</th>
										<th>Expired Voucher</th>
										<th>Tanggal</th>
										<th>Status Expired</th>
										<th>Status Voucher</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($voucher as $dataVoucher)
									<tr id="tr-{{ $loop->iteration }}">
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataVoucher->kode_voucher }}</td>
										<td>{{ $dataVoucher->pemilik }}</td>
										<td>
											@if($dataVoucher->kategori == 1)
											Haji
											@elseif($dataVoucher->kategori == 2)
											Umroh
											@endif
										</td>
										<td>{{ $dataVoucher->nama_voucher }}</td>
										<td>Rp {{ number_format($dataVoucher->nominal, 2, ',', '.') }}</td>
										<td><span class="countdown" data-tanggal-awal="{{ $dataVoucher->tanggal_mulai }}" data-tanggal-akhir="{{ $dataVoucher->tanggal_akhir }}">Mohon Tunggu..</span></td>
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

	var table = document.getElementById("table-voucher");

	var x = setInterval(
	    function () {

	        for (var i = 1, row; row = table.rows[i]; i++) {
	            //iterate through rows
	            //rows would be accessed using the "row" variable assigned in the for loop

	            var endDate = new Date($('#tr-'+i+' .countdown').data('tanggal-akhir'));
	            var startDate = new Date($('#tr-'+i+' .countdown').data('tanggal-awal'));

	            countDownDate = endDate.getTime();
	            var countDown = $('#tr-'+i+' .countdown');
	            // Update the count down every 1 second

	            // Get todays date and time
	            var now = new Date().getTime();

	            var tanggal = new Date();
	            // Find the distance between now an the count down date
	            var distance = countDownDate - now;

	            // Time calculations for days, hours, minutes and seconds
	            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	            var seconds = Math.floor((distance % (1000 * 60)) / 1000);


	            // Display the result in the element
	            if (startDate > tanggal) {
	            	countDown.text('Akan Datang');
	            }else{
	            	countDown.text(days+' Hari '+hours+' Jam '+minutes+' Menit '+seconds+' Detik ');
	            }

	            //If the count down is finished, write some text 
	            if (distance < 0) {
	                clearInterval(x);
	                countDown.text('Expired');
	            }
	        }
	    }, 1000);

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