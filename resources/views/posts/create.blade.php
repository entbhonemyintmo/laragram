@extends('layouts.app')

@section('content')
    <div class="container">
        <form
              action="/p"
              method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Add new post...
                        </h1>
                    </div>
                    <div
                         class="row form-group">
                        <label
                               for="caption"
                               class="col-md-4 col-form-label">Caption</label>
                        <input
                               name="caption"
                               id="caption"
                               type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               caption='caption'
                               value="{{ old('caption') }}"
                               autocomplete="caption"
                               autofocus>
                        @error('caption')
                            <span
                                  class="invalid-feedback"
                                  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <label
                               for="mdeia"
                               class="col-md-4 col-form-label">Post
                            Image</label>

                        <input
                               type="file"
                               class="form-control-file @error('media') is-invalid @enderror"
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

                    <div class="pt-4">
                        <button
                                class="btn btn-primary">Add
                            New
                            Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
