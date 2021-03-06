@extends('layout.main')

@section('content')
	<h1>Login</h1>

	<div class="row">
		<div class="col-xs-12 col-sm-4">
		{{ Form::open(array('route' => 'sessions.store')) }}
			<div class="form-group">
				{{ Form::label('email', 'E-mail address') }}
				{{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>

			{{ Form::submit('Login', ['class' => 'btn btn-submit']) }}
		{{ Form::close() }}
		</div>
	</div>
@stop
