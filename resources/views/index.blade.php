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

		/*#form-page {
			opacity: 0;
			height: 35em;
   			position: relative;
		}

		#form-page .centered {
			margin: 0;
			position: absolute;
		    top: 50%;
		    left: 50%;
		    margin-right: -50%;
		    transform: translate(-50%, -50%);
		}*/

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
		#loading {
			position:fixed;
			top: 50%;
			left: 50%;
			transform:translate(-50%, -50%);
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

<div id="loading">
  <img id="loading-image" class="animated infinite pulse" src="{{ asset('assets/images/logo.png') }}" alt="Loading..." width="300" height="300" />
</div>

<div id="form-page" class="valign-wrapper" style="width:100%;height:100%;position: absolute;">
	<div class="valign" style="width:100%;">
		<div class="container">
			<div class="row">
				
				<div class="centered">
					<div class="logo" style="text-align: center">
						<img src="{{ asset('assets/images/logo.png') }}" alt="logo" width="150" height="150">
						<h4 style="color:white; text-align: center"><b>tanyabudi</b></h4>
					</div>
					<form method="post" action="{{ url('login') }}">


					@if(Session::has('success'))

					<div class="card green darken-1">
						   <div class="row">
						    <div class="col s12 m10">
						      <div class="card-content white-text">
						      	<p>{{ Session::get('success') }}</p>
												</div>
						  </div>
						  <div class="col s12 m2">
						    <i class="fa fa-times icon_style"                             id="alert_close" aria-hidden="true"></i>
						  </div>
						  </div>
						  </div>


					@endif
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
  <div class="col s12 m2">
    <i class="fa fa-times icon_style"                             id="alert_close" aria-hidden="true"></i>
  </div>
  </div>
  </div>

						@endif
						@csrf
						<div class="row">
							<div class="input-field col s12">
								<input type="text" class="validate" name="email" placeholder="Nomor Hp / Email">
							</div>
							<div class="input-field col s12">
								<input type="password" class="validate" name="password" placeholder="Password">
							</div>
							<div class="col s12">
								<button type="submit" class="btn waves-effect waves-light green btn-block btn-flat" style="color:white;"><b>LOG IN</b></a>
							</div>
						</div>
					</form>
					<div class="col s12">
						<a href="{{ url('register') }}" class="btn waves-effect waves-light blue btn-block btn-flat" style="color:white;"><b>SIGN UP</b></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/materialize/js/materialize.min.js') }}"></script>
<script type="text/javascript">
	$(window).on('load', function(){
		$('#loading').addClass('animated fadeOut');

		$('#form-page').css('opacity', '1');
		$('#form-page').addClass('animated fadeInDown')
	});
</script>
</body>
</html>