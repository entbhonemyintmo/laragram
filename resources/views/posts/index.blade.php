@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <img src="/storage/{{ $post->media }}"
                         alt=""
                         class="w-100">
                </div>
            </div>
            <div class="row ">
                <div class="col-6 offset-3">
                    <h3>{{ $post->user->name }}
                    </h3>
                    <p>{{ $post->caption }}
                    </p>
                </div>
            </div>
        @endforeach


        <div class="row">
            <div
                 class="col-12 d-flex justify-content-center">

                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>


    </div>
@endsection
