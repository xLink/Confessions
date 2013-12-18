<blockquote style='margin-left: 13px'>{{{ $confession->body }}}</blockquote>
<p style='margin-left: 45px'>&mdash; <i>{{{ ($confession->anonymous) ? 'Anonymous' : $confession->user->username }}}</i>, <a href="{{ route('confessions.show', ['id' => $confession->id]) }}" title="Permalink to this confession">{{ $confession->created_at->diffForHumans() }}</a></p>
