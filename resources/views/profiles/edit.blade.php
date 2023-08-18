@extends('layouts.app')

@section('content')
    <div class="container">
        <div
             class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Profile</div>

                    <div class="card-body">
                        <form method="POST"
                              action="/profile/{{$user->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div
                                 class="row mb-3">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-end">Title</label>

                                <div
                                     class="col-md-6">
                                    <input id="title"
                                           type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{ old('title') ?? $user->profile->title }}"
                                           required
                                           autocomplete="title"
                                           autofocus>

                                    @error('title')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div
                                 class="row mb-3">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-end">Description</label>

                                <div
                                     class="col-md-6">
                                    <input id="description"
                                           type="text"
                                           class="form-control @error('description') is-invalid @enderror"
                                           name="description"
                                           value="{{ old('description') ?? $user->profile->description }}"
                                           required
                                           autocomplete="description"
                                           autofocus>

                                    @error('description')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                 class="row mb-3">
                                <label for="url"
                                       class="col-md-4 col-form-label text-md-end">Url</label>

                                <div
                                     class="col-md-6">
                                    <input id="url"
                                           type="url"
                                           class="form-control @error('url') is-invalid @enderror"
                                           name="url"
                                           value="{{ old('url') ?? $user->profile->url}}"
                                           required
                                           autocomplete="url">

                                    @error('url')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div
                                 class="row mb-3">
                                <label
                                       for="media"
                                       class="col-md-4 col-form-label text-md-end">Profile</label>

                                <div
                                     class="col-md-6">
                                    <input
                                           type="file"
                                           class="form-control @error('media') is-invalid @enderror"
                                           id="media"
                                           name="media">

                                    @error('media')
                                        <span
                                              class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                 class="row mb-0">
                                <div
                                     class="col-md-6 offset-md-4 d-flex gap-3">
                                    <button type="submit"
                                            class="btn btn-primary flex-grow-1">
                                        save
                                    </button>
                                    <button type="button"
                                            class="btn btn-outline-danger flex-grow-1">
                                        cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
