@extends('layout.main')

@section('content')
	<h1>Groups</h1>

	@if(count($groups) == 0)
		<p>There don't seem to be any groups yet. Maybe you should <a href="{{ route('groups.create') }}">create one</a>?</p>
	@else
		<p>Looking for someting a little more niche? Or maybe you'd like to <a href="{{ route('groups.create') }}">create your own</a> group.</p>

		<hr />

		@foreach($groups as $group)
		<div class="row">
			<div class="col-xs-12">
				@include('_partials.group')
			</div>
		</div>

		<hr />
		@endforeach

		{{ $groups->links() }}
	@endif
@stop
