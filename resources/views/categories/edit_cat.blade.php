@extends('layouts.profile-layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1>Edit category</h1>
        <br><br><br>
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $category->name }}">
            <br><br>
            <button type="submit" class="mb-3">Edit</button>
        </form>
        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Category" onclick="return confirm('Are you sure you want to delete this category?');">
          </form>
    </div>
</div>

@endsection
