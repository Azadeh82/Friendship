@extends('layouts.app')

@section('title')
FRENDSHIP - Modifier Message
@endsection

@section('content')

<div class="container my-md-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-5 fw-bolder">{{ __('Modifier les message') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('messages.update' , $message) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                
                                <textarea class="form-control" id="floatingTextarea " rows="3" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ $message->message }}" required autocomplete="message" autofocus></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $message->image }}" autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('Tags') }}</label>

                          <div class="col-md-6">
                              <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $message->tags }}" required autocomplete="tags" autofocus>

                              @error('tags')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Modifier message') }}
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