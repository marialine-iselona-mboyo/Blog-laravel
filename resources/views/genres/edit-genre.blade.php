@extends('layouts.profile-layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1>Edit genre</h1>
        <br><br><br>
        <form method="POST" action="{{ route('genre.update', $genre->id) }}">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $genre->name }}">
            <br><br>
            <button type="submit" class="mb-3">Edit</button>
        </form>
        <form method="POST" action="{{ route('genres.destroy', $genre->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Genre" onclick="return confirm('Are you sure you want to delete this genre?');">
          </form>
    </div>
</div>

@endsection
