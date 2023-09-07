@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-6 offset-2">
                    <img src="/storage/{{ $post->media }}"
                         alt=""
                         class="w-100">
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-2">
                    <h3>{{ auth()->user()->username }}
                    </h3>
                    <p>{{ $post->caption }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection