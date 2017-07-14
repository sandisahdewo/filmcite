@extends('layouts.base')

@push('metadata')
<meta property="og:title" content="{{ $film->title }}">
<meta property="og:description" content="{{ $film->description }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $film->poster_url }}">
<meta property="og:type" content="video.movie">
<meta property="og:locale" content="{{ config('app.locale') }}">
@endpush

@section('content')
<section id="app" class="wrapper">
	<div class="inner">

		<h1 class="major">
			{{ $film->title }}
			@if ($film->year)
				({{ $film->year }})
			@endif
		</h1>


		@if (! empty($film->poster))
			<span class="image left img-responsive"><img src="{{ $film->poster_url }}" alt="{{ $film->title }}" /></span>
		@endif

		<h3>Overview</h3>
		<p>{{ $film->description }}</p>

		<div class="row">
			<div class="col-md-12">
				<div class="features">
					@foreach ($film->quotes as $quote)
						<section>
							<span class="icon major fa-user"></span>
							<h3>{{ $quote->role }}</h3>
							<blockquote>
								"{{ $quote->quote }}""
							</blockquote>

							<film-rate></film-rate>
						</section>
					@endforeach
				</div>
				<ul class="actions">
					<li><a href="#" class="button special">Load more</a></li>
				</ul>
			</div>
		</div>

		<section>
			<h2>Submit Spoiler for {{ $film->title }}</h2>
			<form method="post" action="#">
				<div class="row uniform">
					<div class="6u 12u$(xsmall)">
						<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name">
					</div>
					<div class="6u$ 12u$(xsmall)">
						<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email">
					</div>
					<div class="12u$">
						<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
					</div>
					<div class="12u$">
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="special"></li>
							<li><input type="reset" value="Reset"></li>
						</ul>
					</div>
				</div>
			</form>
		</section>
	</div>
</section>
@endsection
