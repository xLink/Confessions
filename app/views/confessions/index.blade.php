@extends('layout.main')

@section('content')
	<h1>Confessions</h1>

	@if(count($confessions) == 0)
		<p>There don't seem to be any confessions yet. Maybe you should <a href="{{ route('confessions.create') }}">write one</a>?</p>
	@else
		<p>Looking for some juicy gossip? Or maybe you'd like to <a href="{{ route('confessions.create') }}">write your own</a> confession.</p>

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
