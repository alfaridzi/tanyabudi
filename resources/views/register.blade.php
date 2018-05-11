<!DOCTYPE html>
<html>
<head>
	<title>Tanyabudi</title> <!-- BASE COLOR = #2F0F62 -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/materialize/css/materialize.min.css') }}" media="screen,projection">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/animate/animate.css') }}">
	<style type="text/css">
		body {
			background-color: #2F0F62;
		}

		::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: white;
		}
		::-moz-placeholder { /* Firefox 19+ */
		  color: white;
		}
		:-ms-input-placeholder { /* IE 10+ */
		  color: white;
		}
		:-moz-placeholder { /* Firefox 18- */
		  color: white;
		}

		#form-page {
			opacity: 0;
		}

		#form-page form input {
			color: white;
		}

		@media only screen and (min-width: 993px) {
			.container {
				width: 50%;
			}
		}

		#btn-user {
			position: relative;
			background-color: #18CC3E;
			border-radius: 5px;
			padding: 10px;
			font-size: 14px;
			font-weight: bold;
			border: 0px;
			height: 100%;
			min-height: 100px;
			max-height: 200px;
			cursor: pointer;
		}

		#btn-user:hover {
			background-color: #00A523;
		}

		#btn-user i {
			font-size: 100px;
			color: white;
		}

		#btn-user span {
			color: white;
		}

		#btn-agen {
			position: relative;
			background-color: #1374C6;
			border-radius: 5px;
			padding: 10px;
			font-size: 14px;
			font-weight: bold;
			border: 0px;
			height: 100%;
			min-height: 100px;
			max-height: 200px;
			cursor: pointer;
		}

		#btn-agen:hover {
			background-color: #005399;
		}

		#btn-agen i {
			font-size: 100px;
			color: white;
		}

		#btn-agen span {
			color: white;
		}

		.btn-block {
			width: 100%;
		}

		.btn-flat {
			border-radius: 0px;
		}
		/*margin:0 auto;width:90%;max-width:1280px;*/
	</style>
</head>
<body>

<div id="form-pilihan" class="valign-wrapper" style="width:100%;height:100%; margin-top:30px;">



	

	<div class="valign" style="width:100%;">
		<div class="container">
			<div class="row">
				<div class="centered">
					<div class="logo" style="text-align: center">
						<img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="100" height="100">
						<h5 style="color:white; text-align: center; margin-top: -5px;"><b>tanyabudi</b></h5>
					</div>
				</div>
				<br>
				<div class="kotak-pilihan" style="text-align: center">
					<button id="btn-user"><i class="material-icons">person_outline</i><br><span>DAFTAR USER</span></button>
					&nbsp;
					<button id="btn-agen"><i class="material-icons">assignment_ind</i><br><span>DAFTAR AGEN</span></button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="form-page" class="valign-wrapper" style="width:100%;height:100%; margin-top:30px;">
	<div class="valign" style="width:100%;">
		<div class="container">
			<div class="row">
				<div class="centered">
					<div class="logo" style="text-align: center">
						<img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="100" height="100">
						<h5 style="color:white; text-align: center; margin-top: -5px;"><b>tanyabudi</b></h5>
					</div>
					<form method="post" id="form-user" action="{{ url('api/register') }}">
						@csrf


 @if($errors->any())
						<div class="card red darken-1">
   <div class="row">
    <div class="col s12 m10">
      <div class="card-content white-text">
						@foreach($errors->all() as $error)

							<p>{{ $error }}</p>


						@endforeach
						</div>
  </div>
  
  </div>
  </div>

						@endif

						<input type="hidden" name="tipe_user" value="1">
						<div class="row">
							<div class="input-field col s12">
								<input type="text" class="validate" name="name" placeholder="Nama Lengkap" required>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="nohp" placeholder="Nomor Hp" required>
							</div>
							<div class="input-field col s12">
								<input type="email" class="validate" name="email" placeholder="Email" required>
							</div>
							<div class="input-field col s12">
								<input type="password" class="validate" name="password" placeholder="Password" required>
							</div>
							<div class="input-field col s12">
								<input type="password" class="validate" name="c_password" placeholder="Konfirmasi Password" required>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="referal" placeholder="Kode Referal (Optional)">
							</div>
							<input type="hidden" value="1" name="type">

							<div class="col s12">
								<label>
							        <input required id="syarat-ketentuan" name="syarat-ketentuan" type="checkbox"/>
							        <span style="color: white;">Saya setuju dengan <a href="{{ url('syarat-ketentuan') }}">Syarat & Ketentuan</a></span>
							    </label>
						    </div>
							<div class="col s12">
								<br>
								<button type="submit" class="btn waves-effect waves-light green btn-block btn-flat" style="color:white;"><b>SIGN UP</b></button>
							</div>
						</div>
					</form>
					<form method="post" id="form-agen" action="{{ url('api/register') }}">



						@if($errors->any())
						<div class="card red darken-1">
   <div class="row">
    <div class="col s12 m10">
      <div class="card-content white-text">
						@foreach($errors->all() as $error)

							<p>{{ $error }}</p>


						@endforeach
						</div>
  </div>
 
  </div>
  </div>

						@endif



						@csrf


						<input type="hidden" name="tipe_user" value="2">
						<div class="row">
							<div class="input-field col s12">
								<input type="text" class="validate" name="name" placeholder="Nama Lengkap" required>
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="nohp" placeholder="Nomor Hp" required>
							</div>
							<div class="input-field col s12">
								<input type="email" class="validate" name="email" placeholder="Email" required>
							</div>
							<div class="input-field col s12">
								<input type="password" class="validate" name="password" placeholder="Password" required>
							</div>
							<div class="input-field col s12">
								<input type="password" class="validate" name="c_password" placeholder="Konfirmasi Password" required>
							</div>
							<div class="input-field col s12">
								<?php


								?>
								<select name="paket">
									<?php $paket = App\produk::where('type', 5)->orderBy('harga','desc')->get() ?>
									@foreach($paket as $item)
									<option value="{{ $item->id }}">{{ $item->nama.' - Rp.'.number_format($item->harga,0,'.','.') }}</option>
									
									@endforeach
								</select>
							</div>


							<input type="hidden" value="2" name="type">
							<input type="hidden" value="0" name="status">
							<div class="col s12">
								<label>
							        <input required id="syarat-ketentuan" name="syarat-ketentuan" type="checkbox"/>
							        <span style="color: white;">Saya setuju dengan <a href="{{ url('syarat-ketentuan-agen') }}">Syarat & Ketentuan</a></span>
							    </label>
						    </div>
							<div class="col s12">
								<br>
								<button type="submit" class="btn waves-effect waves-light green btn-block btn-flat" style="color:white;"><b>SIGN UP</b></button>
							</div>
						</div>
					</form>
					<div class="col s12">
						<button id="btn-batal" class="btn waves-effect waves-light blue btn-block btn-flat" style="color:white;"><b>BATAL</b></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/materialize/js/materialize.min.js') }}"></script>
<script type="text/javascript">


	function getParam(param){
	  return new URLSearchParams(window.location.search).get(param);
	}


	



	function insertParam(key,value) {
      if (history.pushState) {
          var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' +key+'='+value;
          window.history.pushState({path:newurl},'',newurl);
      }
    }

	$('#form-page').hide();
	$(document).ready(function(){
    	$('select').formSelect();
		$('#btn-user').on('click', function(){
			$('#form-pilihan').hide();
			$('#form-page').css('opacity', '1');
			$('#form-page').addClass('animated fadeIn');
			$('#form-page').show();
			$('#form-user').show();
			$('#form-agen').hide();

			insertParam('view','user');
		});

		$('#btn-batal').on('click', function(){
			$('#form-page').css('opacity', '0');
			$('#form-page').hide();
			$('#form-pilihan').addClass('animated fadeIn');
			$('#form-pilihan').show();
		});

		$('#btn-agen').on('click', function(){
			$('#form-pilihan').hide();
			$('#form-page').css('opacity', '1');
			$('#form-page').addClass('animated fadeIn');
			$('#form-page').show();
			$('#form-agen').show();
			$('#form-user').hide();
			insertParam('view','agen');
		});



		if(getParam('view') == 'user') {
			$('#btn-user').click();
		}else if(getParam('view') == 'agen') {
			$('#btn-agen').click();
		}

	});
</script>
</body>
</html>