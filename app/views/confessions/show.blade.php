@extends('layout.main')

@section('content')
	<h1>Confession by {{{ ($confession->anonymous) ? 'Anonymous' : $confession->user->username }}}</h1>

	<br />

	<div class="row">
		<div class="col-xs-12">
			<blockquote style='margin-left: 13px'>{{{ $confession->body }}}</blockquote>
			<p style='margin-left: 45px'>&mdash; <i>{{{ ($confession->anonymous) ? 'Anonymous' : $confession->user->username }}}</i>, {{ $confession->created_at->diffForHumans() }}</p>
		</div>
	</div>

	<hr />

	<p>Back to <a href="{{ route('confessions.index') }}">all confessions</a>.</p>
@stop
