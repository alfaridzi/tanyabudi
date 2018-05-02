@extends('admin.layout.app')
@section('title', 'Dashboard Admin')
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
			{{-- <!-- Box total transaksi per hari -->
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
		        	<div class="inner">
		            	<h3>50</h3>

		            	<p>Total Transaksi Hari Ini</p>
		            </div>
		            <div class="icon">
		            	<i class="ion ion-bag"></i>
		            </div>
		            <a href="#" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
		        </div>
			</div>
			<!-- Box total user -->
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-orange">
		        	<div class="inner">
		            	<h3>250</h3>

		            	<p>Total User</p>
		            </div>
		            <div class="icon">
		            	<i class="ion ion-person"></i>
		            </div>
		            <a href="#" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
		        </div>
			</div> --}}
		</div>

	</section>
	<!-- /.content -->
</div>
@endsection