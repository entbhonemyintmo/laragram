@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4"
                 style="place-items: center; display: grid;">
                <img src="/formalPP.jpg"
                     alt="profile-pic"
                     class="rounded-circle"
                     style="width: 12rem;">
            </div>
            <div class="col-8 py-5">
                <div
                     class="d-flex justify-content-between">
                      <h3>{{ $user->username }}
                      </h3>
                    <a href="/p/create"
                       class="btn btn-primary">Add
                        Post</a>
                </div>
                <a href="/profile/{{auth()->user()->id}}/edit">Edit profile</a>
                <div
                     class="d-flex gap-5 my-3">
                    <div>
                        <strong>{{$user->posts->count()}}</strong>&nbsp;posts
                    </div>
                    <div>
                        <strong>21k</strong>&nbsp;followers
                    </div>
                    <div>
                        <strong>212</strong>&nbsp;following
                    </div>
                </div>
                <h1 class="">
                    {{ $user->name }}
                </h1>
                <p>{{ $user->profile->description ?? 'N/A' }}
                </p>
                <a href="{{$user->profile->url}}" target="_blank">{{$user->profile->url}}</a>

            </div>
        </div>
        <div class="row">

            @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                   <a href="/p/{{$post->id}}">
                    <img src="/storage/{{ $post->media }}"
                    alt=""
                    class="w-100">
                   </a>
                </div>
            @endforeach



        </div>
    </div>
@endsection
