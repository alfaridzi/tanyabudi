@extends('user.layout.app-3')
@section('page-title', 'Instruksi Pembayaran')
@push('css')
<style type="text/css">
	.konten-bantuan ul {
		padding-left: 18px;
	}
	.konten-bantuan ul li {
		list-style-type: inherit !important;
		text-indent: -.4em;
	}
</style>
@endpush
@section('content')
<div class="konten-bantuan">
	<div class="container">
		<div class="row">
			{!! $bantuan->konten !!}
		</div>
	</div>
</div>
@endsection