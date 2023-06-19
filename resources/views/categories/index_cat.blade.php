@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('categories/create_cat')}}" class="btn btn-success">Add Category</a>
        </div>


        <h1>List of Categories</h1>
        <br><br><br>
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->name }}</li>
                <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-success mb-3">Edit Category</a>
            @endforeach
        </ul>
    </div>
</div>



@endsection
