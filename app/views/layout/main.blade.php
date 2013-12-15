<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> {{ Config::get('app.name') }} </title>

	<!-- Bootstrap assets -->
	<link href="//netdna.bootstrapcdn.com/bootswatch/3.0.2/journal/bootstrap.min.css" rel="stylesheet" />
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

	<!-- FontAwesome assets -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" />

	<!-- Custom assets -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">{{ Config::get('app.name') }}</a>
		</div>

		<div class="collapse navbar-collapse navbar-right" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if(!Auth::check())
					<li><a href="#">Login</a></li>
				@else
					<li><a href="#">Groups</a></li>
					<li><a href="#">Logout</a></li>
				@endif
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<nav class="hidden-xs col-sm-2">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#">Home</a></li>
					@if(!Auth::check())
						<li><a href="#">Login</a></li>
						<li><a href="#">Signup</a></li>
					@else
						<li><a href="#">Groups</a></li>
					@endif
				</ul>
			</nav>

			<div class="col-xs-12 col-sm-10">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>