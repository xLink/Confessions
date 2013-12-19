<blockquote style='margin-left: 13px'>{{{ $confession->body }}}</blockquote>
<p style='margin-left: 45px'>&mdash; <i>{{{ ($confession->anonymous) ? 'Anonymous' : $confession->user->username }}}</i>, <a href="{{ route('confessions.show', ['id' => $confession->id]) }}" title="Permalink to this confession">{{ $confession->created_at->diffForHumans() }}</a></p>
@if($user->id == $confession->user_id)
	{{ Form::open(array('route' => array('confessions.destroy', $confession->id), 'method' => 'delete')) }}
		{{ Form::submit('Delete this confession', array('class' => 'btn btn-sm btn-danger', 'style' => 'margin-left: 45px')) }}
	{{ Form::close() }}
@endif
