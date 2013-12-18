@extends('layout.main')

@section('content')
	<h1>Confession by {{{ ($confession->anonymous) ? 'Anonymous' : $confession->user->username }}}</h1>

	<br />

	<div class="row">
		<div class="col-xs-12">
			@include('_partials.confession')
		</div>
	</div>

	<hr />

	<p>Back to <a href="{{ route('confessions.index') }}">all confessions</a>.</p>
@stop
