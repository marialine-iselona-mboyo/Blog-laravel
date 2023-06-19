@extends('layouts.profile-layout')

@section('content')

    <h1>Search Results</h1>
    @foreach ($users as $user)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <h6 class="card-text">{{ $user->username }}</h6>
            <p class="card-text">{{ $user->email }}</p>
            <p class="card-text">{{ $user->about_me }}</p>
        </div>
    </div>
    @endforeach

@endsection
