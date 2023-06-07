@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Frequently Asked Questions</h1>

        @foreach ($categories as $category)
            <h2>{{ $category->name }}</h2>
            <ul>
                @foreach ($category->faqs as $faq)
                    <li>
                        <h3>{{ $faq->question }}</h3>
                        <p>{{ $faq->answer }}</p>
                        <div>
                            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-secondary">Modify</a>
                            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?')">Supprimer</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endforeach

        <a href="{{ route('faq.create') }}" class="btn btn-primary">Add Question</a>
    </div>
@endsection
