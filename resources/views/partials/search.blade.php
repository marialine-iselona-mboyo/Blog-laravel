@extends('layouts.profile-layout')

@section('content')

<h1>Search Results</h1>

<h2>Users</h2>
@if ($users->count() > 0)
    <ul>
        @foreach ($users as $user)
            <h5 class="card-title">{{ $user->name }}</h5>
            <h6 class="card-text">{{ $user->username }}</h6>
            <p class="card-text">{{ $user->email }}</p>
            <p class="card-text">{{ $user->about_me }}</p>
        @endforeach
    </ul>
@else
    <p>No users found.</p>
@endif

<h2>Posts</h2>
@if ($posts->count() > 0)
    @foreach ($posts as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-text">{{ $post->message }}</h6>
                <p class="card-text">{{ $post->genre->name }}</p>
            </div>
        </div>
    @endforeach
@else
    <p>No posts found.</p>
@endif

@endsection
