<blockquote style='margin-left: 13px'>{{{ $confession->body }}}</blockquote>
<p style='margin-left: 45px'>&mdash; <i>{{{ ($confession->anonymous) ? 'Anonymous' : $confession->user->username }}}</i>, <a href="{{ route('confessions.show', ['id' => $confession->id]) }}" title="Permalink to this confession">{{ $confession->created_at->diffForHumans() }}</a>@if($confession->group), in <a href="{{ route('groups.show', ['id' => $confession->group->id]) }}">{{{ $confession->group->name }}}</a>.@endif</p>
@if($user->id == $confession->user_id)
	{{ Form::open(['route' => ['confessions.destroy', $confession->id], 'method' => 'delete']) }}
		{{ Form::submit('Delete this confession', ['class' => 'btn btn-sm btn-danger', 'style' => 'margin-left: 45px']) }}
	{{ Form::close() }}
@endif
