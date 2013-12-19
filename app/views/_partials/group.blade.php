<p><b><a href="{{ route('groups.show', ['id' => $group->id]) }}">{{{ $group->name }}}</a></b></p>
@if($group->description)
<p><i>{{{ $group->description }}}</i></p>
@endif
@if($user->id == $group->user_id)
	{{ Form::open(array('route' => array('groups.destroy', $group->id), 'method' => 'delete')) }}
		{{ Form::submit('Delete this group', array('class' => 'btn btn-sm btn-danger')) }}
	{{ Form::close() }}
@endif
