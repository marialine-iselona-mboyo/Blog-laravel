@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Message Details</h1>

        @foreach ($messages as $message)
            <div class="mb-3">
                <strong>Name:</strong> {{ $message->name }}
            </div>

            <div class="mb-3">
                <strong>Email:</strong> {{ $message->email }}
            </div>

            <div class="mb-3">
                <strong>Subject:</strong> {{ $message->subject }}
            </div>

            <div class="mb-3">
                <strong>Message:</strong> {{ $message->message }}
            </div>
            <hr>
        @endforeach
    </div>
@endsection


