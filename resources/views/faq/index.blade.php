@extends('layouts.app')


@section('content')

<header class="py-3 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bolder">Frequently Asked Questions</h1>
        </div>
    </div>
</header>
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @foreach ($categories as $category)
        <br>
            <h3>{{ $category->name }}</h3>
            <br>
            <ul>
                @foreach ($category->faqs as $faq)
                    <li>
                        <h4>{{ $faq->question }}</h4>
                        <p>{{ $faq->answer }}</p>

                        @auth
                        @if(Auth::user()->is_admin)
                        <div>
                            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-secondary">Modify</a>
                            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this quetsion?')">Delete</button>
                            </form>
                        </div>
                        @endif
                        @endauth
                    </li>
                    <br>
                @endforeach

            </ul>
        @endforeach
        @auth
        @if(Auth::user()->is_admin)
            <a href="{{ route('faq.create') }}" class="btn btn-primary">Add Question</a>
        @endif
        @endauth
    </div>
@endsection
