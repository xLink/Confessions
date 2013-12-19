<p><b><a href="{{ route('groups.show', ['id' => $group->id]) }}">{{{ $group->name }}}</a></b></p>
@if($group->description)
<p><i>{{{ $group->description }}}</i></p>
@endif
@if($user->id == $group->user_id)
	<a class="btn btn-sm btn-primary" href="{{ route('groups.edit', ['id' => $group->id]) }}">Edit this group</a>
	{{ Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'delete', null, 'style' => 'display: inline-block']) }}
		{{ Form::submit('Delete this group', ['class' => 'btn btn-sm btn-danger']) }}
	{{ Form::close() }}
@endif
