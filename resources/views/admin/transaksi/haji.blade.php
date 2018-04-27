@extends('admin.layout.app')
@section('title', 'Transaksi')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Transaksi Haji
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
		            <div class="box-body">
		            	<table class="table table-responsive">
		            		<thead>
		            			<tr>
		            				<th>No</th>
		            				<th>Nama Produk</th>
		            				<th>Deskripsi Produk</th>
		            				<th>Harga Produk</th>
		            				<th>Nama User</th>
		            				<th>Jumlah Pembayaran</th>
		            				<th>Tanggal Pembayaran</th>
		            				<th>Bukti Pembayaran</th>
		            				<th>Status</th>
		            				<th>Aksi</th>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			@foreach($haji as $dataHaji)
		            			<tr>
		            				<td>{{ $loop->iteration }}</td>
		            				<td>{{ $dataHaji->nama }}</td>
		            				<td>{{ $dataHaji->desc_prod }}</td>
		            				<td>{{ $dataHaji->harga }}</td>
		            				<td>{{ $dataHaji->jumlah_pembayaran }}</td>
		            				<td>{{ Tanggal::tanggalIndonesia($dataHaji->tgl_pembayaran) }}</td>
		            				<td><img src="{{asset('bukti-tf/'.$dataHaji->foto)}}" class="img-responsive" width="300"></td>
		            				<td>{{ $dataHaji->status_pembayaran == 0 ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi' }}</td>
		            				<td><a href="javascript:;" class="btn btn-success btn-flat">Konfirmasi</a></td>
		            			</tr>
		            			@endforeach
		            		</tbody>
		            	</table>
		            </div>
		        </div>
			</div>
		</div>
	</section>
</div>
@endsection
			