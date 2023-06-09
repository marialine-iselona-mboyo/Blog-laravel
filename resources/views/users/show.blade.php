@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col ">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">

                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <img src="/storage/avatars/{{ Auth::user()->avatar }}"
                        style="width:110px; margin-left: 15px; margin-top:10px"
                        class="d-flex flex-column">

                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" style="z-index: 1;text-decoration: none; color: black;">
                            <button type="button" style="padding: 5%; background-color: white; border-color: gray;">
                                Edit profile
                            </button>
                        </a>

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
                <h6>Liked Posts</h6>
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

