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

<!--
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-8">
                <div class="section-title">
                    <h2>Messages</h2>
                </div>
            </div>

            <div class="col-md-6">
                @if (isset($messages))
                    @foreach ($messages as $message)
                        <div class="message-item">
                            <h4>{{ $message->subject }}</h4>
                            <p>{{ $message->name }} ({{ $message->email }})</p>
                            <p>{{ $message->message }}</p>
                        </div>
                    @endforeach
                @elseif (isset($message))
                    <div class="message-item">
                        <h4>{{ $message->subject }}</h4>
                        <p>{{ $message->name }} ({{ $message->email }})</p>
                        <p>{{ $message->message }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

-->
