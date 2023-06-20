@extends('layouts.profile-layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1>Create a Category</h1>
        <br><br>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Create Category</button>
            </div>
        </form>
    </div>
</div>

@endsection
