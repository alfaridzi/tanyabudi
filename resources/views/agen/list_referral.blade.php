@extends('user.layout.app-1')
@section('page-title', 'List Referral')
@section('content')
<div class="list-referral">
	<div class="page-break">
		List Referral
	</div>
	<div class="container">
		<div class="row">
			<table class="table-responsive">
				<tr>
					<th>Nama User</th>
					<th class="center-align">PPOB</th>
					<th class="center-align">Pembelian Pulsa</th>
					<th class="center-align">Top Up Saldo</th>
					<th class="center-align">Penghasilan</th>
				</tr>
				<tr>
					<td>M.Yusuf</td>
					<td class="center-align">5</td>
					<td class="center-align">42</td>
					<td class="center-align">0</td>
					<td class="center-align">Rp 105.000</td>
				</tr>
				<tr>
					<td>Junedi</td>
					<td class="center-align">5</td>
					<td class="center-align">42</td>
					<td class="center-align">0</td>
					<td class="center-align">Rp 105.000</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@endsection