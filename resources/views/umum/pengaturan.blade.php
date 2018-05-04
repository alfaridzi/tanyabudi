@extends('user.layout.app-1')
@section('page-title', 'Pengaturan')
@push('css')
<style type="text/css">
	body {
		background-color: #E2E2E2;
	}
	#gambar-user {
		height: 200px;
		width: 200px;
	}
</style>
@endpush
@section('content')
<div class="pengaturan">
	<div class="container">
		<div class="row">
			<h5>Pengaturan</h5>
			<br>
			<form>
				<div class="row">
					<div class="col s12 center-align">
						<img src="{{ url('assets/images/user', Auth::user()->gambar) }}" class="circle responsive-img" id="gambar-user" onError="this.onerror=null;this.src='{{ asset('assets/images/user-1.png') }}';">
					</div>
					<div class="file-field input-field col s12">
						<div class="btn">
							<span>Gambar</span>
							<input type="file" name="gambar" id="gambar">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
					<div class="input-field col s12">
						<input type="text" name="name" class="validate" value="{{ Auth::user()->name }}" placeholder="Nama" required>
					</div>
					<div class="input-field col s12">
						<input type="text" name="nohp" class="validate" value="{{ Auth::user()->nohp }}" placeholder="Nomor HP" required>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password" id="password" class="validate" placeholder="Password">
					</div>
					<div class="hide-input input-field col s12">
						<input type="password" name="password_confirmation" class="validate" placeholder="Password Konfirmasi">
					</div>
					<div class="center-align">
						<button type="submit" class="btn waves-effect waves-light">Edit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('.hide-input').hide();
		$(document).on('keyup', '#password', function(){
			var value = $(this).val();
			if (value != "") {
				$('.hide-input').show();
			}else{
				$('.hide-input').hide();
			}
		});
		function readUploadImagemember(input, output) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
	                $(output).attr('src', e.target.result);
	            }
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $("#gambar").change(function () {
	        readUploadImagemember(this, '#gambar-user');
	    });
	});
</script>
@endpush