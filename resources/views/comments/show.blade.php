@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete Comment</div>

                <div class="card-body">
                    <p>Are you sure you want to delete this comment?</p>

                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete Comment"
                        onclick="return confirm('Are you sure you want to delete this comment?');">
                        <button type="submit" class="btn btn-danger">Delete Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
