@extends('user.layout.app-1')
@section('page-title', 'Detail Paket')
@section('content')
<div class="container">
	<div class="row">
		<form method="post" class="form-detail">
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<input type="text" class="validate" name="nama_paket" placeholder="Nama Paket" value="Paket Umroh ( Auto Sesuai Pilihan Awal )" readonly>
				</div>
				<div class="input-field col s12">
					<input type="number" class="validate" name="harga" placeholder="Harga" value="Harga" readonly>
				</div>
				<div class="input-field col s12">
					<textarea id="deskripsi" class="materialize-textarea" placeholder="Deskripsi" rows="50" readonly></textarea>
					<label for="deskripsi">Deskripsi</label>
				</div>
				<div class="col s12 center-align">
					<button class="btn-konfirmasi" style="padding: 10px 10px">Beli Paket</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection