@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modify the Question</h1>

        <form action="{{ route('faq.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ $faq->question }}" required>
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ $faq->answer }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modify</button>
        </form>
    </div>
@endsection
