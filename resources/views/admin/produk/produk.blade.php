@extends('admin.layout.app')
@section('title', 'Data Produk')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Data Produk
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-bookmark"></i> Produk</a></li>
	    <li class="active">Data Produk</li>
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
		            		<a href="{{ url('index/admin/produk/tambah') }}" class="btn btn-primary btn-flat">Tambah Produk</a>
		            	</div>
		            	<div class="pull-right">
		            		<form method="get" class="form-inline" action="{{ url('index/admin/produk/'.$namaProduk.'/search') }}">
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
		            	<table class="table table-responsive table-bordered">
		            		<thead>
		            			<tr>
		            				<td>No</td>
		            				<td>Nama Produk</td>
		            				@if($tipe == 1 || $tipe == 2 || $tipe == 3)
		            				<td>Harga</td>
		            				@endif
		            				<td>Deskripsi Produk</td>
		            				<td>Aksi</td>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			@foreach($produk as $dataProduk)
		            			<tr>
		            				<td>{{ $loop->iteration }}</td>
		            				<td>{{ $dataProduk->nama }}</td>
		            				@if($tipe == 1 || $tipe == 2 || $tipe == 3)
		            				<td>Rp {{ number_format($dataProduk->harga, 2, ',', '.') }}</td>
		            				@endif
		            				<td>{{ $dataProduk->desc_prod }}</td>
		            				<td><a href="{{ url('index/admin/produk/edit', $dataProduk->id) }}" class="btn btn-warning btn-flat">Edit</a> <a href="javascript:;" id="btn-delete-produk" class="btn btn-danger btn-flat">Delete</a></td>
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
<form id="frm-delete-produk" method="post" action="">
	@csrf
</form>
@endsection