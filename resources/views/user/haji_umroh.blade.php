@extends('user.layout.app')
@section('page-title', 'Haji dan Umroh')
@section('content')
<div class="container">
	<div class="row">
		<div class="haji-umroh">
			<ol>
				<a href="#">
				<li>
					<img src="{{ asset('assets/images/icon/haji.png') }}" class="responsive-img"><br>
					<span class="btn-konfirmasi">Haji</span>
				</li>
				</a>
				<a href="#">
				<li>
					<img src="{{ asset('assets/images/icon/umroh.png') }}" class="responsive-img"><br>
					<span class="btn-konfirmasi">Umroh</span>
				</li>
				</a>
			</ol>
		</div>
	</div>
</div>
@endsection