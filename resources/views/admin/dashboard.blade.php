@extends('admin.layout.app')
@section('title', 'Dashboard Admin')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/lightbox/ekko-lightbox.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Dashboard
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Dashboard</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h4>Chart Transaksi</h4>
					</div>
					<div class="box-body">
						<div class="pull-right">
							<form action="" class="form-inline" id="frm-chart" role="form">
								<div class="form-group">
									<select id="pilih-status" name="status" class="form-control" required>
										<option selected="" disabled="">--Pilih Status--</option>
										<option value="3">Semua</option>
										<option value="1">Diterima</option>
										<option value="2">Ditolak</option>
									</select>
								</div>
								<div class="form-group">
									<select id="pilih-tahun" name="tahun" class="form-control" required>
										<option selected="" disabled="">--Pilih Tahun--</option>
										@foreach($tahun as $data)
										<option value="{{ $data->tahun }}">{{ $data->tahun }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-flat" id="btn-chart"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
							</form>
						</div>
						<canvas id="chart-penjualan" height="100"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
		            	<h4>Registrasi User</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
			            	<table class="table table-bordered" id="table-user">
			            		<thead>
			            				<th>Transaksi</th>
			            				<th>Nomor HP</th>
			            				<th>Tanggal Pembayaran</th>
			            				@can('konfirmasi transaksi')
			            				<th>Aksi</th>
			            				@endcan
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@if($user->isEmpty())
			            			<tr>
			            				<td colspan="5" style="text-align: center;">Tidak Ada User Baru</td>
			            			</tr>
			            			@else
			            			@foreach($user as $dataUser)
			            			<tr>
			            				<td>{{ $dataUser->id_payment }}</td>
			            				<td>{{ $dataUser->nohp }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataUser->tgl_pembayaran) }}</td>
			            				@can('konfirmasi transaksi')
			            				<td>
			            				@if($dataUser->status_pembayaran == 0)
			            					<a href="javascript:;" data-id="{{ $dataUser->id_payment }}" data-status="1" class="btn btn-success btn-flat btn-konfirmasi-user"><i class="fa fa-check"></i></a>
			            					<a href="javascript:;" data-id="{{ $dataUser->id_payment }}" data-status="2" class="btn btn-danger btn-flat btn-konfirmasi-user"><i class="fa fa-times"></i></a>
			            					<a href="javascript:;" id="btn-detail-transaksi" 
			            					data-no-transaksi="{{ $dataUser->id_payment }}" 
			            					data-tipe="1"
			            					data-id-prod="{{ $dataUser->id_prod }}" 
			            					data-desc-prod="{{ $dataUser->desc_prod }}"
			            					data-harga="Rp {{ number_format($dataUser->harga, 2, ',', '.') }}"

			            					data-jumlah-bayar="Rp {{ number_format($dataUser->jumlah_pembayaran, 2, ',', '.') }}"
			            					data-nama-user="{{ $dataUser->name }}"
			            					data-email="{{ $dataUser->email }}"
			            					data-nohp="{{ $dataUser->nohp }}"
			            					data-produk="{{ $dataUser->nama }}"
			            					data-bukti="{{ $dataUser->foto }}"
			            					data-tanggal="{{ Tanggal::tanggalIndonesia($dataUser->tgl_pembayaran) }}" class="btn btn-info btn-flat"><i class="fa fa-info" aria-hidden="true"></i>
			            					</a>
			            				@endif
			            				</td>
			            				@endcan
			            			</tr>
			            			@endforeach
			            			@endif
			            		</tbody>
			            	</table>
			            </div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header">
		            	<h4>Transaksi Baru <span id="test"></span></h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
			            	<table class="table table-bordered" id="table-transaksi">
			            		<thead>
			            			<tr>
			            				<th>Transaksi</th>
			            				<th>Produk</th>
			            				<th>Tanggal Pembayaran</th>
			            				@can('konfirmasi transaksi')
			            				<th>Aksi</th>
			            				@endcan
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@if($transaksi->isEmpty())
			            			<tr>
			            				<td colspan="6" style="text-align: center;">Tidak Ada Transaksi Baru</td>
			            			</tr>
			            			@else
			            			@foreach($transaksi as $dataTransaksi)
			            			<tr>
			            				<td>{{ $dataTransaksi->id_payment }}</td>
			            				<td>
			            					@if($dataTransaksi->id_prod == '3910')
			            					Tabungan
			            					@elseif($dataTransaksi->id_prod == '3911')
			            					Top Up Saldo
			            					@else
			            					{{ $dataTransaksi->nama }}
			            					@endif
			            				</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataTransaksi->tgl_pembayaran) }}</td>
			            				@can('konfirmasi transaksi')
			            				<td>
			            				@if($dataTransaksi->status_pembayaran == 0)
			            					<a href="javascript:;" data-id="{{ $dataTransaksi->id_payment }}" data-status="1" class="btn btn-success btn-flat btn-konfirmasi-transaksi"><i class="fa fa-check" aria-hidden="true"></i></a>
			            					<a href="javascript:;" data-id="{{ $dataTransaksi->id_payment }}" data-status="2" class="btn btn-danger btn-flat btn-konfirmasi-transaksi"><i class="fa fa-times" aria-hidden="true"></i></a>
			            				@endif
			            				<a href="javascript:;" id="btn-detail-transaksi" 
			            					data-no-transaksi="{{ $dataTransaksi->id_payment }}" 
			            					data-tipe="2"
			            					data-id-prod="{{ $dataTransaksi->id_prod }}" 
			            					data-desc-prod="{{ $dataTransaksi->desc_prod }}"
			            					data-harga="Rp {{ number_format($dataTransaksi->harga, 2, ',', '.') }}" 
			            					data-jumlah-bayar="Rp {{ number_format($dataTransaksi->jumlah_pembayaran, 2, ',', '.') }}"
			            					data-nama-user="{{ $dataTransaksi->name }}"
			            					data-email="{{ $dataTransaksi->email }}"
			            					data-nohp="{{ $dataTransaksi->nohp }}"
			            					data-produk="{{ $dataTransaksi->nama }}"
			            					data-bukti="{{ $dataTransaksi->foto }}"
			            					data-tanggal="{{ Tanggal::tanggalIndonesia($dataTransaksi->tgl_pembayaran) }}" class="btn btn-info btn-flat"><i class="fa fa-info" aria-hidden="true"></i>
			            				</a>
			            				</td>
			            				@endcan
			            			</tr>
			            			@endforeach
			            			@endif
			            		</tbody>
			            	</table>
		            	</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<form id="frm-konfirmasi" action="" method="post">
	@csrf
	<input type="hidden" name="status" id="status">
</form>

<!-- Modal -->
<div class="modal fade" id="modal-transaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="">Detail Transaksi <span id="nomor-transaksi"></span></h4>
      </div>
      <div class="modal-body">
      	<ul style="list-style: none;">
        	<li><a href="" id="bukti" target="__BLANK">Klik disini untuk lihat bukti transfer</a></li>
        	<li>Nama User: <span id="nama-user"></span></li>
        	<li>Email User: <span id="email"></span></li>
        	<li>Nomor HP User: <span id="nohp"></span></li>
        	<li>Jumlah Pembayaran: <span id="jumlah-bayar"></span></li>
        	<hr>
        	<li>Nama Produk: <span id="nama-produk"></span></li>
        	<li id="desc-prod">Deskripsi Produk: <p id="desc-prod"></p></li>
        	<li id="harga">Harga: <span id="harga"></span></li>
        	<li>Tanggal Pembayaran: <span id="tanggal-pembayaran"></span></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('admin/plugins/lightbox/ekko-lightbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	setInterval(function () {
        AutoReload();
    }, 30000); // 1000 ==> 1 second

	$(document).on('click', '.btn-konfirmasi-transaksi', function(e){
		e.preventDefault();
		var jawaban = confirm('Apakah anda yakin?');
        if (jawaban) {
        	var link = "{{ url('/') }}";
        	var status = $(this).data('status');
            var id = $(this).data('id');
            $('#frm-konfirmasi').attr('action', '{{ url('index/admin/transaksi/konfirmasi/') }}/'+id);
            $('#status').val(status);
            $('#frm-konfirmasi').submit();
        }
	});

	$(document).on('click', '.btn-konfirmasi-user', function(e){
		e.preventDefault();
		var jawaban = confirm('Apakah anda yakin?');
        if (jawaban) {
        	var link = "{{ url('/') }}";
        	var status = $(this).data('status');
            var id = $(this).data('id');
            $('#frm-konfirmasi').attr('action', '{{ url('index/admin/transaksi/konfirmasi-user/konfirmasi/') }}/'+id);
            $('#status').val(status);
            $('#frm-konfirmasi').submit();
        }
	});

 	var ctx = document.getElementById("chart-penjualan");
	var chart = new Chart(ctx, {
    // The type of chart we want to create
	    type: 'line',

	    // The data for our dataset
	    data: {
	        labels: ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGU", "SEP", "OKT", "NOV", "DES"],
	        datasets: [{
	            label: "Transaksi",
	            borderColor: 'rgb(255, 99, 132)',
	            fill: false,
	            data: {{ $chart_transaksi }},
	        }]
	    },

	    // Configuration options go here
	    options: {}
	});

	$('#frm-chart').submit(function(e){
		e.preventDefault();
		var value = $(this).serialize();
		var link = "{{ url('index/admin/ajax/dashboard_chart') }}";
		$.ajax({
		     url: link,
		     method: 'GET',
		     data: value,
		     success: function(data){
		     	var ctx = document.getElementById("chart-penjualan");
				var chart = new Chart(ctx, {
			    // The type of chart we want to create
				    type: 'line',

				    // The data for our dataset
				    data: {
				        labels: ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGU", "SEP", "OKT", "NOV", "DES"],
				        datasets: [{
				            label: "Transaksi",
				            borderColor: 'rgb(255, 99, 132)',
				            fill: false,
				            data: JSON.parse(data),
				        }]
				    },

				    // Configuration options go here
				    options: {}
				});
				data = null;
		     },
	    });
	    return false;
	});

    function AutoReload(){

    	var link = "{{ url('index/admin/ajax/dashboard_transaksi') }}";
    	var hitung = $('#table-transaksi tbody').children().length;
    	var jumlah = 'jumlah='+hitung;
    	$.ajax({
			url: link,
			method: 'GET',
			data: jumlah,
			success: function(data) {
				if (hitung <= 10) {
					$('#table-transaksi tbody').prepend(data);
				}else{
					$('#table-transaksi tbody tr:last-child').remove();
					$('#table-transaksi tbody').prepend(data);
				}
			},
			error: function(data){
				console.log(data.responseJSON.msg);
			}
	    });

		var link = "{{ url('index/admin/ajax/dashboard_user') }}";
    	var hitung = $('#table-user tbody').children().length;
    	var jumlah = 'jumlah='+hitung;
	    $.ajax({
			url: link,
			method: 'GET',
			data: jumlah,
			success: function(data) {
				if (hitung <= 10) {
					$('#table-user tbody').prepend(data);
				}else{
					$('#table-user tbody tr:last-child').remove();
					$('#table-user tbody').prepend(data);
				}
			},
			error: function(data){
				console.log(data.responseJSON.msg);
			}
	    });
    }

    $(document).on('click', '#btn-detail-transaksi', function(){
    	$('#modal-transaksi').modal('show');

    	var nomor_transaksi = $(this).data('no-transaksi');
    	var bukti = "{{url('bukti-tf')}}/"+$(this).data('bukti');
    	var nama_user = $(this).data('nama-user');
    	var email = $(this).data('email');
    	var nohp = $(this).data('nohp');

    	var id_prod = $(this).data('id-prod');

    	if (id_prod == '3910') {
    		var nama_produk = 'Tabungan';
    		$('li#desc-prod').hide();
    		$('li#harga').hide();
    		$('span#nama-produk').text(nama_produk);
    	}else if(id_prod == '3911'){
    		var nama_produk = 'Top Up Bayar - Bayar';
    		$('li#desc-prod').hide();
    		$('li#harga').hide();
    		$('span#nama-produk').text(nama_produk);
    	}else{
    		var nama_produk = $(this).data('produk');
    		var desc_prod = $(this).data('desc-prod');
    		var harga = $(this).data('harga');

    		$('li#desc-prod').show();
    		$('li#harga').show();

    		$('span#nama-produk').text(nama_produk);
	    	$('p#desc-prod').text(desc_prod);
	    	$('span#harga').text(harga);
    	}
    	var jumlah_bayar = $(this).data('jumlah-bayar');
    	var tanggal_pembayaran = $(this).data('tanggal');

    	$('span#nomor-transaksi').text(nomor_transaksi);
    	$('a#bukti').attr('href', bukti);
    	$('span#nama-user').text(nama_user);
    	$('span#email').text(email);
    	$('span#nohp').text(nohp);
    	$('span#jumlah-bayar').text(jumlah_bayar);
    	$('span#tanggal-pembayaran').text(tanggal_pembayaran);

    });
});
</script>
@endpush