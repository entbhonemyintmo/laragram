@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-8">
            <img src="/storage/{{$post->media}}" alt="" class="w-100">
          </div>
          <div class="col-4">
            <h3>{{auth()->user()->username}}</h3>
            <p>{{$post->caption}}</p>
          </div>
        </div>
    </div>
@endsection