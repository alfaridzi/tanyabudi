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
	<nav>
	    <div class="nav-wrapper">
	    	<a href="#" class="brand-logo"><img class="responsive-img" src="{{ asset('assets/images/logo/logo-horizontal-1.png') }}"></a>
	    	<ul id="nav-mobile" class="right hide-on-med-and-down">
	      		<li><a href="#"><i class="material-icons">notifications_none</i></a></li>
	      		<li><a href="#"><i class="material-icons">settings</i></a></li>
	      	</ul>
	      	<ul class="left hide-on-large-only">
	      		<li><a href="#"><i class="material-icons">assignment_ind</i></a></li>
	      	</ul>
	      	<ul class="right hide-on-large-only">
	      		<li><a href="#"><i class="material-icons">notifications_none</i></a></li>
	      		<li><a href="#"><i class="material-icons">settings</i></a></li>
	      	</ul>
	    </div>
	</nav>
</div>

@yield('content')

<footer>
	<nav class="nav-center" role="navigation">
	    <div class="nav-wrapper container">
	        <ul>
	            <li><a href="#"><i class="icon icon-home"></i></a></li>
	            <li><a href="#"><i class="icon icon-kabah"></i></a></li>
	            <li><a href="#"><i class="icon icon-sedekah"></i></a></li>
	            <li><a href="#"><i class="icon icon-pesawat-alt"></i></a></li>
	            <li><a href="#"><i class="icon icon-store"></i></a></li>
	        </ul>
	    </div>
	</nav>
</footer>
@stack('js')
</body>
</html>