<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> {{ Config::get('app.name') }} </title>

	<!-- Bootswatch: Yeti theme CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

	<!-- FontAwesome CSS -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" />

	<!-- Custom styles -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

	<!-- JS assets -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('home') }}">{{ Config::get('app.name') }}</a>
		</div>

		<div class="collapse navbar-collapse navbar-right" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if(!Auth::check())
					<li class="visible-xs {{ route_active('home') }}"><a class="{{ route_active('home') }}" href="{{ route('home') }}">Home</a></li>
					<li class="{{ route_active('login') }}"><a href="{{ route('login') }}">Login</a></li>
					<li class="visible-xs {{ route_active('signup') }}"><a href="{{ route('signup') }}">Signup</a></li>
				@else
					<li class="visible-xs {{ route_active(['confessions.index', 'confessions.show', 'confessions.create']) }}"><a href="{{ route('confessions.index') }}">Feed</a></li>
					<li class="visible-xs {{ route_active(['groups.index', 'groups.show', 'groups.create', 'groups.edit']) }}"><a href="{{ route('groups.index') }}">Groups</a></li>
					<li><a href="{{ route('logout') }}">Logout</a></li>
				@endif
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<nav class="hidden-xs col-sm-2">
				<ul class="nav nav-pills nav-stacked">
					@if(!Auth::check())
						<li class="{{ route_active('home') }}"><a class="{{ route_active('home') }}" href="{{ route('home') }}">Home</a></li>
						<li class="{{ route_active('login') }}"><a href="{{ route('login') }}">Login</a></li>
						<li class="{{ route_active('signup') }}"><a href="{{ route('signup') }}">Signup</a></li>
					@else
						<li class="{{ route_active(['confessions.index', 'confessions.show', 'confessions.create']) }}"><a href="{{ route('confessions.index') }}">Feed</a></li>
						<li class="{{ route_active(['groups.index', 'groups.show', 'groups.create', 'groups.edit']) }}"><a href="{{ route('groups.index') }}">Groups</a></li>
					@endif
				</ul>
			</nav>

			<div class="col-xs-12 col-sm-10">
				<div class="row">
					@if(Session::has('error'))
						<div class="alert alert-danger">
							<strong>Uh-oh!</strong> {{ Session::get('error') }}
						</div>
					@endif
					@if(Session::has('warning'))
						<div class="alert alert-warning">
							<strong>Warning...</strong> {{ Session::get('warning') }}
						</div>
					@endif
					@if(Session::has('message'))
						<div class="alert alert-info">
							{{ Session::get('message') }}
						</div>
					@endif
					@if(Session::has('success'))
						<div class="alert alert-success">
							{{ Session::get('success') }}
						</div>
					@endif
				</div>

				<div class="row">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
</body>
</html>
