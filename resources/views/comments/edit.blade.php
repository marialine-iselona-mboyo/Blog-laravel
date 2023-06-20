@extends('layouts.profile-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Comment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update', ['postId' => $postId, 'commentId' => $commentId]) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="content">Comment Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3">
                                {{ $comment->content }}
                            </textarea>
                        </div>

                        <!--<textarea name="content">{ $comment->content }}</textarea>-->

                        <button type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
