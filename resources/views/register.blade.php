<!DOCTYPE html>
<html>
<head>
	<title>Tanyabudi</title> <!-- BASE COLOR = #2F0F62 -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/materialize/css/materialize.min.css') }}" media="screen,projection">
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

		#form-page form input {
			color: white;
		}

		@media only screen and (min-width: 993px) {
			.container {
				width: 50%;
			}
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

<div id="form-page" class="valign-wrapper" style="width:100%;height:100%; margin-top:30px;">
	<div class="valign" style="width:100%;">
		<div class="container">
			<div class="row">
				<div class="centered">
					<div class="logo" style="text-align: center">
						<img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="100" height="100">
						<h5 style="color:white; text-align: center"><b>tanyabudi</b></h5>
					</div>
					<form method="post">
						@csrf
						<div class="row">
							<div class="input-field col s12">
								<input type="text" class="validate" name="nama" placeholder="Nama Lengkap">
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="nomor_hp" placeholder="Nomor Hp">
							</div>
							<div class="input-field col s12">
								<input type="email" class="validate" name="email" placeholder="Email">
							</div>
							<div class="input-field col s12">
								<input type="password" class="validate" name="password" placeholder="Password">
							</div>
							<div class="input-field col s12">
								<input type="password" class="validate" name="konfirmasi_password" placeholder="Konfirmasi Password">
							</div>
							<div class="input-field col s12">
								<input type="text" class="validate" name="kode_referal" placeholder="Kode Referal (Optional)">
							</div>
							<div class="col s12">
								<button type="submit" class="btn waves-effect waves-light green btn-block btn-flat">Log In</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/materialize/js/materialize.min.js') }}"></script>
</body>
</html>