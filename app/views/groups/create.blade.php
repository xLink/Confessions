@extends('layout.main')

@section('content')
	<h1>Find people like you...</h1>

	<div class="row">
		<div class="col-xs-12 col-sm-6">
		{{ Form::open(array('route' => 'groups.store')) }}
			<div class="form-group">
				{{ Form::label('name', 'Group Name') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 40]) }}
				{{ $errors->first('name', "<p class='error'>:message</p>") }}
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::text('description', null, ['class' => 'form-control', 'maxlength' => 255]) }}
				{{ $errors->first('description', "<p class='error'>:message</p>") }}
			</div>

			{{ Form::submit('Create', ['class' => 'btn btn-submit']) }}
		{{ Form::close() }}
		</div>
	</div>
@stop
