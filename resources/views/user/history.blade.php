@extends('user.layout.app-1')
@section('page-title', 'History')
@section('content')
<div class="container-fluid">
	<div class="row">


		<?php
		$history = App\history::where('id_user',Auth::user()->id)->orderBy('created_at','desc')->get();
		?>


		
		<div class="group-list">
			<div class="page-break">
				April 2018
			</div>

			@foreach($history as $item)
			<div class="list">
				<div class="title-list">
					{{ $item->title }}
				</div>
				<div class="sub-title">
					{{ $item->jam }} - {{ $item->info }}
				</div>
			</div>
			@endforeach

		</div>
		

		<!--
		<div class="group-list">
			<div class="page-break">
				04 APRIL 2018
			</div>
			<div class="list">
				<div class="title-list">
					TOP UP BAYAR-BAYAR
				</div>
				<div class="sub-title">
					08:09 - Isi Saldo
				</div>
			</div>
		</div>
		<div class="group-list">
			<div class="page-break">
				08 APRIL 2018
			</div>
			<div class="list">
				<div class="title-list">
					PPOB
				</div>
				<div class="sub-title">
					10:09 - PDAM
				</div>
			</div>
			<div class="list">
				<div class="title-list">
					PULSA
				</div>
				<div class="sub-title">
					14:23 - Telkomsel 10K
				</div>
			</div>
		</div>-->
	</div>
</div>	
@endsection