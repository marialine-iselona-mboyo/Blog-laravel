@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{route('genres/create-genre')}}" class="btn btn-success">Add Genre</a>
            </div>
        </div>

        <h1>List of Genres</h1>
        <br><br><br>
        @foreach ($genres as $genre)
            <ul>
                <li>{{$genre->name}}</li>
                <br>
                @foreach ($genre->posts as $post)
                    <p>{{$post->title}}</p>
                    <p>{{$post->message}}</p>
                @endforeach
                <br>
            </ul>
        @endforeach
    </div>
@endsection
