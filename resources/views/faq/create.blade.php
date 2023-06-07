@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add a Question</h1>

        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Choose a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>
            @if(Auth::user()->is_admin)
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Add question</button>
        </form>
    </div>
@endsection
