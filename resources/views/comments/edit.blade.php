@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Comment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comment.update', $comment->id) }}">
                        @method('PUT')
                        @csrf

                        <textarea name="content">{{ $comment->content }}</textarea>

                        <button type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
