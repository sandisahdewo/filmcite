<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
	<head>
		<title>{{ config('app.name') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<meta property="og:title" content="{{ config('app.name') }}">
		<meta property="og:description" content="{{ config('app.description') }}">
		<meta property="og:url" content="{{ url()->current() }}">
		<meta property="og:image" content="">
		<meta property="og:locale" content="{{ config('app.locale') }}">

		<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->

		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />

		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/ie8.css') }}" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('css/ie9.css') }}" /><![endif]-->
	</head>
	<body>

		<div id="app">
			<!-- Sidebar -->
			<section id="sidebar">
				<navigation></navigation>
			</section>

			<!-- Wrapper <-->
			<div id="wrapper">

				<!-- Intro -->
				<section id="search" class="wrapper style1 fullscreen fade-up">
					<film-search></film-search>
				</section>

				<!-- Two -->
				<section id="quote" class="wrapper style3 fade-up">
					<film-spoiler></film-spoiler>
				</section>

				<!-- Latest -->
				<film-latest></film-latest>

				<!-- Three -->
				<section id="submit" class="wrapper style1 fade-up">
					<form-spoiler></form-spoiler>
				</section>

			</div>
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
