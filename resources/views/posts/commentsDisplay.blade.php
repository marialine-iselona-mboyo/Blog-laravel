@foreach($comments as $comment)
    <div>
        <p class="card-text">{{ $comment->content }}</p>
        <small>Commented by <a href="{{ route('users/profile', $comment->user->username) }}">
            {{ $comment->user->username }}</a> the {{ $comment->created_at->format('d/m/Y \a\t H:i') }}
        </small>
    </div>
@endforeach
