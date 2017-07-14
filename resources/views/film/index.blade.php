<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
	<head>
		<title>{{ config('app.name') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<meta property="fb:app_id" content="484026278602158">
		<meta property="og:title" content="{{ config('app.name') }}">
		<meta property="og:description" content="{{ config('app.description') }}">
		<meta property="og:url" content="{{ url()->current() }}">
		<meta property="og:image" content="">
		<meta property="og:locale" content="{{ config('app.locale') }}">

		<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->

		<link rel="stylesheet" href="{{ asset('css/main.css') }}" />

		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/ie8.css') }}" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('css/ie9.css') }}" /><![endif]-->

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	</head>
	<body>
		@include('layouts.partials.facebook')

		<div id="app">
			<!-- Sidebar -->
			<section id="sidebar">
				<navigation></navigation>
			</section>

			<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
				<section id="intro" class="wrapper style1 fullscreen fade-up">
					<film-search></film-search>
				</section>

				<!-- Film and quotes -->
				<section id="quote" class="wrapper style3 fade-up">
					<film-quote></film-quote>
				</section>

				<!-- Latest films -->
				<section id="latest" class="wrapper style2 spotlights">
					@foreach ($films as $film)
						<section>
							<a href="{{ $film->film_url }}" class="image"><img src="{{ $film->poster_url }}" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>
										{{ $film->title }}
										@if ($film->year)
											({{ $film->year }})
										@endif
									</h2>
									<film-rate></film-rate>
									<p>{{ str_limit($film->description, 100) }}</p>
									<ul class="actions">
										<li><a href="#" class="button special">View Quote ({{ $film->quotes_count }})</a></li>
										<li><a href="{{ $film->film_url }}" class="button">View Film</a></li>
									</ul>
								</div>
							</div>
						</section>
					@endforeach
				</section>

				<!-- Submit quote -->
				<section id="submit" class="wrapper style1 fade-up">
					<form-quote></form-quote>
				</section>

			</div>

			<!-- Footer -->
			@include('layouts.partials.footer')
		</div>

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
