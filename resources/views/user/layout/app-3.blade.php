<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tanyabudi | @yield('page-title')</title>	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/materialize/css/materialize.min.css') }}" media="screen,projection">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/images/icon/styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
	@stack('css')
</head>
<body>

<!-- Navbar Atas -->
<div class="navbar-fixed">
	<nav id="navbar-atas">
	    <div class="nav-wrapper">
	    	<a href="{{ url('dashboard') }}" class="brand-logo"><img class="responsive-img" src="{{ asset('assets/images/logo/logo-horizontal-1.png') }}"></a>
	      	<ul class="left hide-on-large-only">
	      		<li><a href="javascript:;" onclick="javascript:history.back();"><i class="icon icon-panah"></i></a></li>
	      	</ul>
	    </div>
	</nav>
</div>

@yield('content')
<div class="bantuan">
	<a href="#"><i class="fa fa-question-circle fa-lg"></i></a>
</div>
<script type="text/javascript" src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/materialize/js/materialize.min.js') }}"></script>
@stack('js')
</body>
</html>