@extends('layouts.app')

@section('content')
<h1>{{ $category->name }}</h1>
@foreach ($category->faqs as $faq)
    <h4>{{ $faq->question }}</h4>
    <p>{{ $faq->answer }}</p>
@endforeach
@endsection
