@extends('admin.layout.app')
@section('title', 'Transaksi')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
@endpush
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
						<form method="get" action="{{ url('index/admin/transaksi/ppob/search') }}" class="form-inline">
		            		<div class="form-group">
		            			<select class="form-control" name="status">
		            				<option selected="" disabled="">--Status--</option>
		            				<option value="1">Pending</option>
		            				<option value="2">Gagal</option>
		            				<option value="3">Refund</option>
		            				<option value="4">Berhasil</option>
		            			</select>
		            		</div>
		            		<div class="form-group">
		            			<input type="text" name="tanggal_awal" placeholder="Tanggal Awal" class="form-control datepicker">
		            		</div>
		            		Ke
		            		<div class="form-group">
		            			<input type="text" name="tanggal_akhir" placeholder="Tanggal Akhir" class="form-control datepicker">
		            		</div>
		            		<div class="form-group">
		            			<input type="text" name="search" placeholder="Cari..." class="form-control">
		            		</div>
		            		<div class="form-group">
		            			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
		            		</div>
		            	</form>
					</div>
		            <div class="box-body">
		            	<div class="table-responsive">
			            	<table class="table table-bordered">
			            		<thead>
			            			<tr>
			            				<th>No</th>
			            				<th>Nomor Transaksi</th>
			            				<th>Nama User</th>
			            				<th>Jumlah Pembayaran</th>
			            				<th>Tanggal Pembayaran</th>
			            				<th>Status</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			@if(isset($status))
			            			@foreach($ppob as $dataPPOB)
			            			@if($status == 1)
				            			@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 1)
				            			<tr>
				            				<td>{{ $loop->iteration }}</td>
				            				<td>{{ $dataPPOB->id_pulsa }}</td>
				            				<td>{{ $dataPPOB->name }}</td>
				            				<td>Rp {{ number_format($dataPPOB->jumlah_pembayaran, 2, ',', '.') }}</td>
				            				<td>{{ Tanggal::tanggalIndonesia($dataPPOB->tgl_pembayaran) }}</td>
				            				<td>@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 1)
													Pending
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 2)
													Gagal
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 3)
													Refund
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 4)
													Sukses
												@endif
											</td>
				            			</tr>
				            			@endif
			            			@elseif($status == 2)
				            			@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 2)
				            			<tr>
				            				<td>{{ $loop->iteration }}</td>
				            				<td>{{ $dataPPOB->id_pulsa }}</td>
				            				<td>{{ $dataPPOB->name }}</td>
				            				<td>Rp {{ number_format($dataPPOB->jumlah_pembayaran, 2, ',', '.') }}</td>
				            				<td>{{ Tanggal::tanggalIndonesia($dataPPOB->tgl_pembayaran) }}</td>
				            				<td>@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 1)
													Pending
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 2)
													Gagal
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 3)
													Refund
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 4)
													Sukses
												@endif
											</td>
				            			</tr>
				            			@endif
			            			@elseif($status == 3)
				            			@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 3)
				            			<tr>
				            				<td>{{ $loop->iteration }}</td>
				            				<td>{{ $dataPPOB->id_pulsa }}</td>
				            				<td>{{ $dataPPOB->name }}</td>
				            				<td>Rp {{ number_format($dataPPOB->jumlah_pembayaran, 2, ',', '.') }}</td>
				            				<td>{{ Tanggal::tanggalIndonesia($dataPPOB->tgl_pembayaran) }}</td>
				            				<td>@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 1)
													Pending
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 2)
													Gagal
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 3)
													Refund
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 4)
													Sukses
												@endif
											</td>
				            			</tr>
				            			@endif
			            			@elseif($status == 4)
				            			@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 4)
				            			<tr>
				            				<td>{{ $loop->iteration }}</td>
				            				<td>{{ $dataPPOB->id_pulsa }}</td>
				            				<td>{{ $dataPPOB->name }}</td>
				            				<td>Rp {{ number_format($dataPPOB->jumlah_pembayaran, 2, ',', '.') }}</td>
				            				<td>{{ Tanggal::tanggalIndonesia($dataPPOB->tgl_pembayaran) }}</td>
				            				<td>@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 1)
													Pending
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 2)
													Gagal
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 3)
													Refund
												@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 4)
													Sukses
												@endif
											</td>
				            			</tr>
				            			@endif
			            			@endif
			            			@endforeach
			            			@else
			            			@foreach($ppob as $dataPPOB)
			            			<tr>
			            				<td>{{ $loop->iteration }}</td>
			            				<td>{{ $dataPPOB->id_pulsa }}</td>
			            				<td>{{ $dataPPOB->name }}</td>
			            				<td>Rp {{ number_format($dataPPOB->jumlah_pembayaran, 2, ',', '.') }}</td>
			            				<td>{{ Tanggal::tanggalIndonesia($dataPPOB->tgl_pembayaran) }}</td>
			            				<td>@if(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 1)
												Pending
											@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 2)
												Gagal
											@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 3)
												Refund
											@elseif(Pulsa::status($dataPPOB->id_pulsa)->message[0]->status == 4)
												Sukses
											@endif
										</td>
			            			</tr>
			            			@endforeach
			            			@endif
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
@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			language: 'id',
		});
	});
</script>
@endpush