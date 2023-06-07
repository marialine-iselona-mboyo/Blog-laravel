@extends('layouts.app')

@section('content')
<h1>Edit category</h1>
<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $category->name }}">
    <button type="submit">Edit</button>
</form>
@endsection
