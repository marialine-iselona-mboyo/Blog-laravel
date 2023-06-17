@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1>Create Genre</h1>
        <br><br>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Genre Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <button type="submit" class="btn btn-success">Create Genre</button>
            </div>
        </form>
    </div>
</div>

@endsection
