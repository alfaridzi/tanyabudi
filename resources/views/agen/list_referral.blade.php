@extends('user.layout.app-1')
@section('page-title', 'List Referral')
@section('content')
<div class="list-referral">
	<div class="page-break">
		List Referral
	</div>
	<div class="container">


	<h5>You Referral ID: <code style="padding:5px;border-radius:3px;background-color:grey;color:white">{{ Auth::user()->referal_main }}</code></h5>
		<div class="row">
			<table class="table-responsive">
				<tr>
					<th>Nama User</th>
					<th class="center-align">PPOB</th>
					<th class="center-align">Pembelian Pulsa</th>
					<th class="center-align">Top Up Saldo</th>
					<th class="center-align">Penghasilan</th>
				</tr>
				@foreach($user as $reff)

				<tr>
					<td>{{ $reff->name }}</td>
				</tr>



				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection