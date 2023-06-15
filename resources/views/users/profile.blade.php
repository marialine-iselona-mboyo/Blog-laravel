@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col ">
          <div class="card">

            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; ">

                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">

                    <div class="row mb-3">

                        <div class="col-md-6">

                            <img src="/storage/avatars/{{ Auth::user()->avatar }}"
                            style="width:150px;height:100px; margin-left: 15px; margin-top:10px"
                            class="d-flex flex-column">

                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" style="z-index: 1;text-decoration: none; color: black;margin-top: 15px; margin-left: 15px">
                            <button type="button" style="padding: 5%; background-color: white; border-color: gray;">
                                Edit profile
                            </button>
                        </a>

                    </div>

                </div>

                <div class="ms-3" style="margin-top: 130px;">
                    <h3>{{ $user->name }}</h3>
                </div>

            </div>


            <div class="text-black" style="background-color: #f8f9fa;">
              <div class="justify-content-center text-center py-1">
                    <div class="mb-2">
                        <h4>Information</h4>
                        <p class="font-italic mb-1">{{ $user->name }}</p>
                        <p class="font-italic mb-1">" {{ $user->username }} "</p>
                        <p class="font-italic mb-1">{{ $user->date_of_birth }}</p>
                        <p class="font-italic mb-1">{{ $user->email }}</p>
                    </div>
                </div>
            </div>


            <div class="card-body p-4 text-black">
              <div class="justify-content-between align-items-center mb-4">
                <h3>About me</h3>
                  <p name="about_me" id="about_me" cols="50" rows="4">{{ $user->about_me}}</p>
                <br><br>

                @if (Auth::user()->is_admin)
                <h5>Created Posts</h5>
                    @foreach($user->posts as $post)
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a><br>
                    @endforeach
                @endif

                <hr>

                <h5>Liked Posts</h5>
                @foreach($user->likes as $like)
                    <a href="{{ route('posts.show', $like->post_id) }}">{{ $like->post->title }}</a><br>
                @endforeach

              </div>
            </div>


          </div>
        </div>
      </div>
    </div>

@endsection

