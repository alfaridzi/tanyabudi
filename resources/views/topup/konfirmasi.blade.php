@extends('user.layout.app-1')
@section('page-title', 'Instruksi Pembayaran')
@section('content')
<div class="container">
	<div class="row">
		<h4>Konfirmasi Pembayaran</h4>
		<p>Silahkan melakukan konfirmasi pembayaran dengan mengisi form berikut</p>

		<form method="post" enctype="multipart/form-data" method="post" action="{{ url('selesai/topup') }}">
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<input type="number" class="validate" name="jumlah_pembayaran" placeholder="Jumlah Pembayaran" >
				</div>
				<div class="input-field col s12">
					<input type="text" class="datepicker" name="tgl_pembayaran" placeholder="Tanggal Pembayaran">
				</div>
				<div class="file-field input-field col s12">
					<div class="btn" style="background-color: #4498CE; float:right; border-radius: 40px; width: 100px;">
						<span><i class="fa fa-camera"></i></span>
						<input type="file" name="foto" accept=".png,.jpg,.jpeg">
					</div>
					<div class="file-path-wrapper" style="padding-right: 10px;">
						<input class="file-path validate" placeholder="Nama File" type="text">
					</div>
				</div>
				<div class="col s12 center-align">
					<button type="submit" class="btn-konfirmasi">Selesai</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function(){
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
	});
});
function copyToClipboard(element) {
	var temp = $("<input>");
	$("body").append(temp);
	temp.val($(element).text()).select();
	document.execCommand("copy");
	temp.remove();
}
</script>
@endpush