<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
	<head>
		<title>{{ $title or config('app.name') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@stack('metadata')

		<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->

		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />

		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/ie8.css') }}" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('css/ie9.css') }}" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<a href="{{ route('film.index') }}" class="title">{{ config('app.name') }}</a>
				<nav>
					<ul>
						<li><a href="{{ route('film.index') }}"> <i class="fa fa-home fa-fw"></i> Back to Home</a></li>
						<li><a href="{{ route('film.random') }}">View Random Movie</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			@yield('content')

		</div>

		<!-- Footer -->
		@include('layouts.partials.footer')

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/jquery.scrollex.min.js') }}"></script>
		<script src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
		<script src="{{ asset('js/skel.min.js') }}"></script>
		<script src="{{ asset('js/util.js') }}"></script>
		<!--[if lte IE 8]><script src="{{ asset('js/ie/respond.min.js') }}"></script><![endif]-->
		<script src="{{ asset('js/main.js') }}"></script>

	</body>
</html>
