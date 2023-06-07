@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>


<h1>List of Categories</h1>
<br><br>
<ul>
    @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>

@endsection
