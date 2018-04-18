@extends('user.layout.app-1')
@section('page-title', 'Instruksi Pembayaran')
@section('content')
<div class="page-break center-align">
	Sedekah
</div>
<div class="container">
	<div class="row">
		<form class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<select class="browser-default">
				      <option value="" disabled selected>Pilih Salah Satu</option>
				      <option value="1">Option 1</option>
				      <option value="2">Option 2</option>
				      <option value="3">Option 3</option>
				    </select>
				</div>
				<div class="input-field col s12">
					<input type="text" name="jumlah_sedekah" class="validate" placeholder="Jumlah Sedekah">
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		<h5>Pembayaran</h5>
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
			<a href="{{ url('konfirmasi') }}" class="btn-konfirmasi">Berikutnya</a>
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

$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endpush