@extends('layout.main')

@section('content')
	<header>
		<h1>Group: {{{ $group->name }}}</h1>
		<p>Description: <i>{{{ $group->description }}}</i></p>
	</header>

	@if(count($confessions) == 0)
		<p>There don't seem to be any confessions yet. Maybe you should <a href="{{ route('confessions.create') }}?group={{ $group->id }}">write one</a>?</p>
	@else
		<p>Looking for some juicy gossip? Or maybe you'd like to <a href="{{ route('confessions.create') }}?group={{ $group->id }}">write your own</a> confession.</p>

		<hr />

		@foreach($confessions as $confession)
		<div class="row">
			<div class="col-xs-12">
				@include('_partials.confession')
			</div>
		</div>

		<hr />
		@endforeach

		{{ $confessions->links() }}
	@endif
@stop
