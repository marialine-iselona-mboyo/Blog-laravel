@foreach($comments as $comment)
    <div>
        <p class="card-text">{{ $comment->content }}</p>
    </div>
@endforeach
