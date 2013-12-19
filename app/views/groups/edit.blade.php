@extends('layout.main')

@section('content')
	<h1>Edit your group</h1>

	<div class="row">
		<div class="col-xs-12 col-sm-6">
		{{ Form::open(['route' => ['groups.update', $group->id], 'method' => 'patch']) }}
			<div class="form-group">
				{{ Form::label('name', 'Group Name') }}
				{{ Form::text('name', $group->name, ['class' => 'form-control', 'maxlength' => 40, 'disabled']) }}
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::text('description', $group->description, ['class' => 'form-control', 'maxlength' => 255]) }}
				{{ $errors->first('description', "<p class='error'>:message</p>") }}
			</div>

			{{ Form::submit('Save', ['class' => 'btn btn-submit']) }}
		{{ Form::close() }}
		</div>
	</div>
@stop
