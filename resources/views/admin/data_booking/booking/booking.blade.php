@extends('admin.layout.app')
@section('title', 'Data Booking')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Booking
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-plane"></i> Data Booking</a></li>
	    <li class="active">Data Booking</li>
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
		            	<div class="col-md-12">
			            	<form class="form-inline" method="get" action="{{ url('index/admin/data-booking/booking/search') }}">
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
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Booking</th>
										<th>Nomor Transaksi</th>
										<th>Nama Jamaah</th>
										<th>Jumlah Kursi</th>
										<th>Nama Paket</th>
										<th>Jenis Paket</th>
										<th>Status Pemesan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($booking as $dataBooking)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $dataBooking->kode_booking }}</td>
										<td>{{ $dataBooking->id_transaksi }}</td>
										<td>{{ $dataBooking->nama_paspor }}</td>
										<td>{{ $dataBooking->kuota }}</td>
										<td>{{ $dataBooking->nama }}</td>
										<td>
											@if($dataBooking->type == '1')
											Haji
											@elseif($dataBooking->type == '2')
											Umroh
											@endif
										</td>
										<td>
											@if($dataBooking->status_pemesan == '0')
											Sedang Dipesan
											@elseif($dataBooking->status_pemesan == '1')
											Telah Diterima
											@endif
										</td>
										<td>
											@can('edit booking')
											<a href="{{ url('index/admin/data-booking/booking/edit', $dataBooking->id_booking) }}" class="btn btn-warning btn-flat">Edit</a> 
											@endcan
											@can('print voucher')
											@if(!is_null($dataBooking->id_voucher))
											<a href="{{ url('index/admin/data-booking/booking/print-voucher', $dataBooking->id_booking) }}" class="btn btn-info btn-flat">Print Voucher</a>
											@endif
											@endcan
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							{{ $booking->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection