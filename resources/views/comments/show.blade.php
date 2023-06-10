@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete Comment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                        @method('DELETE')
                        @csrf

                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
