@extends('layouts.base')

@push('metadata')
<meta property="og:title" content="{{ $film->title }}">
<meta property="og:description" content="{{ $film->description }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="">
<meta property="og:type" content="video.movie">
<meta property="og:locale" content="{{ config('app.locale') }}">
@endpush

@section('content')
<section id="app" class="wrapper">
	<div class="inner">

		<h1 class="major">{{ $film->title }}</h1>
		<span class="image left img-responsive"><img src="{{ $film->poster_url }}" alt="{{ $film->title }}" /></span>

		<h3>Overview</h3>
		<p>A card sharp and his unwillingly-enlisted friends need to make a lot of cash quick after losing a sketchy poker match. To do this they decide to pull a heist on a small-time gang who happen to be operating out of the flat next door.</p>

		<div class="row">
			<div class="col-md-12">
				<div class="features">
								<section>
									<span class="icon major fa-user"></span>
									<h3>Lorem ipsum amet</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>

									<i class="fa fa-fw fa-thumbs-up"></i> 0
									<i class="fa fa-fw fa-thumbs-down"></i> 0
								</section>
								<section>
									<span class="icon major fa-user"></span>
									<h3>Aliquam sed nullam</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>

									<i class="fa fa-fw fa-thumbs-up"></i> 0
									<i class="fa fa-fw fa-thumbs-down"></i> 0
								</section>
								<section>
									<span class="icon major fa-user"></span>
									<h3>Sed erat ullam corper</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>

									<i class="fa fa-fw fa-thumbs-up"></i> 0
									<i class="fa fa-fw fa-thumbs-down"></i> 0
								</section>
								<section>
									<span class="icon major fa-user"></span>
									<h3>Veroeros quis lorem</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>

									<i class="fa fa-fw fa-thumbs-up"></i> 0
									<i class="fa fa-fw fa-thumbs-down"></i> 0
								</section>
								<section>
									<span class="icon major fa-user"></span>
									<h3>Urna quis bibendum</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>

									<i class="fa fa-fw fa-thumbs-up"></i> 0
									<i class="fa fa-fw fa-thumbs-down"></i> 0
								</section>
								<section>
									<span class="icon major fa-user"></span>
									<h3>Aliquam urna dapibus</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>

									<i class="fa fa-fw fa-thumbs-up"></i> 0
									<i class="fa fa-fw fa-thumbs-down"></i> 0
								</section>
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
