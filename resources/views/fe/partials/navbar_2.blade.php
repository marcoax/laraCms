<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
							
			<a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL( LaravelLocalization::getCurrentLocale() , url('')) }}">CMS </a>

		</div>

		<!-- Navbar Right -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
					<a href="{{url('')}} " class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Lang <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
						<li>
							@if (LaravelLocalization::getCurrentLocale() ==  $localeCode)
								<a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{{ $properties['native'] }}} </a>
						    @else
								<a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{{ $properties['native'] }}} </a>

						    @endif
						</li>
						@endforeach
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						@if (Auth::check())
						<li>
							<a href="{{ URL::to('/users/logout') }}">Logout</a>
						</li>
						@else
						<li>
							<a href="{{ URL::to('/users/register') }}">Register</a>
						</li>
						<li>
							<a href="{{ URL::to('/users/login') }}">Login</a>
						</li>
						@endif
					</ul>
				</li>

			</ul>
			<ul class="nav navbar-nav navbar">
				<li class="active">
					<a href="/">Home</a>
				</li>
				<li>
					<a href="/about">About</a>
				</li>
				<li>
					<a href="/contact">Contact</a>
				</li>

			</ul>



		</div>
	</div>
</nav>