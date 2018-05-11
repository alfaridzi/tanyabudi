@extends('user.layout.app-1')
@section('page-title', 'Instruksi Pembayaran')
@section('content')
<div class="container">
	<div class="row">
		<h5 style="color: #B0B0B0">Tambah Saldo Bayar Bayar</h5>
		<h4>Instruksi</h4>
		<div class="instruksi">
			<ul class="instruksi-steps">
				<li>Kunjungi jaringan <b>ATM Bersama</b><br><img src="{{ asset('assets/images/atm-bersama.png') }}" class="img-responsive" width="100" height="50"></li>
				<li>Pilih Menu <b>Transfer</b></li>
				<li>Pilih <b>Nama Bank</b> atau masukkan kode bank 000</li>
				<li>Masukan nomor tabungan anda : <br><b id="norek">9-0587-4256-7890-7</b><br><a href="javascript:;" onclick="copyToClipboard('b#norek')">Salin</a></li>
				<li>Masukan <b>Nominal Isi Ulang</b></li>
			</ul>
		</div>
		<br>
		<div class="center-align">
			<a href="topup/konfirmasi" class="btn-konfirmasi">Konfirmasi Pembayaran</a>
		</div>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
function copyToClipboard(element) {
	var temp = $("<input>");
	$("body").append(temp);
	temp.val($(element).text()).select();
	document.execCommand("copy");
	temp.remove();
}
</script>
@endpush