@extends('layout.main')

@section('content')
	<h1>Confessions</h1>

	@if(count($confessions) == 0)
		<p>There don't seem to be any confessions yet. Maybe you should <a href="{{ route('confessions.create') }}">write one</a>?</p>
	@else
		<p>Looking for some juicy gossip?</p>

		<hr />

		@foreach($confessions as $confession)
		<div class="row">
			<div class="col-xs-12">
				<blockquote style='margin-left: 13px'>{{{ $confession->body }}}</blockquote>
				<p style='margin-left: 45px'>&mdash; <i>{{{ ($confession->anonymous) ? 'Anonymous' : $confession->user->username }}}</i>, {{ $confession->created_at->diffForHumans() }}</p>
			</div>
		</div>

		<hr />
		@endforeach

		<p>Would you like to <a href="{{ route('confessions.create') }}">write your own</a> confession?</p>
	@endif
@stop
