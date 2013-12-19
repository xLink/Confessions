@extends('layout.main')

@section('content')
	<h1>Get it off your chest...</h1>

	<div class="row">
		<div class="col-xs-12 col-sm-6">
		{{ Form::open(array('route' => 'confessions.store')) }}
			<div class="form-group">
				{{ Form::label('body', 'Confession') }}
				{{ Form::textarea('body', null, ['class' => 'form-control', 'maxlength' => 255]) }}
				{{ $errors->first('body', "<p class='error'>:message</p>") }}
			</div>

			@if($group)
			<div class="form-group">
				{{ Form::label('group', "Post to '" . $group->name . "'?") }}
				{{ Form::checkbox('group', $group->id, true) }}
			</div>
			@endif

			<div class="form-group">
				{{ Form::label('anonymous', 'Post anonymously?') }}
				{{ Form::checkbox('anonymous', null, true) }}
				{{ $errors->first('anonymous', "<p class='error'>:message</p>") }}
			</div>

			{{ Form::submit('Post', ['class' => 'btn btn-submit']) }}
		{{ Form::close() }}
		</div>
	</div>
@stop
