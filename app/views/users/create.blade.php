@extends('layout.main')

@section('content')
	<h1>Create an account</h1>

	<div class="row">
		<div class="col-xs-12 col-sm-6">
		{{ Form::open(array('route' => 'users.store')) }}
			<div class="form-group">
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username', null, ['class' => 'form-control', 'maxlength' => 20]) }}
				{{ $errors->first('username', "<p class='error'>:message</p>") }}
			</div>

			<div class="form-group">
				{{ Form::label('email', 'E-mail address') }}
				{{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => 255]) }}
				{{ $errors->first('email', "<p class='error'>:message</p>") }}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				{{ $errors->first('password', "<p class='error'>:message</p>") }}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Confirm Password') }}
				{{ Form::password('confirm_password', ['class' => 'form-control']) }}
				{{ $errors->first('confirm_password', "<p class='error'>:message</p>") }}
			</div>

			{{ Form::submit('Signup', ['class' => 'btn btn-submit']) }}
		{{ Form::close() }}
		</div>
	</div>
@stop
