@extends('admin.layout.app')
@section('title', 'Transaksi')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Transaksi PPOB
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
					</div>
		            <div class="box-body">
		            	<div class="table-responsive">
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<th>No</th>
			            				<th>Nomor Transaksi</th>
			            				<th>Nama Produk</th>
			            				<th>Nama User</th>
			            				<th>Jumlah Pembayaran</th>
			            				<th>Tanggal Pembayaran</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@foreach($ppob as $dataPPOB)
			            			<tr>
			            				<td>{{ $loop->iteration }}</td>
			            				<td>{{ $dataPPOB->id_pulsa }}</td>
			            				<td>
			            					<?php dump(Pulsa::status($dataPPOB->id_pulsa)); ?>

			            				</td>
			            				<td>{{ $dataPPOB->name }}</td>
			            				<td>Rp {{ number_format($dataPPOB->jumlah_pembayaran, 2, ',', '.') }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataPPOB->tgl_pembayaran) }}</td>
			            			</tr>
			            			@endforeach
			            		</tbody>
			            	</table>
		            	</div>
		            	<div class="pull-right">
							{!! $ppob->links() !!}
						</div>
		            </div>
		        </div>
			</div>
		</div>
	</section>
</div>
@endsection