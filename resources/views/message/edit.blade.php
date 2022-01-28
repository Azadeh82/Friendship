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
                    <form method="POST" action="{{ route('messages.update' , $message) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('message') }}</label>

                            <div class="col-md-6">
                                @if(Session::get('image'))
                                <input type="text" class="form-control" name="image" id="image" value="{{ Session::get('image') }}">
                                @else
                                <input type="text" class="form-control" name="image" id="image" placeholder="upload d'image ci-dessous">
                                @endif

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
                                <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $message->image }}" autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('tags') }}</label>

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

                <div class="col-md-6 mx-auto">
                    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                    
                            <div class="col-md-10">
                                <input type="file" name="image" class="form-control">
                            </div>
                    
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                      </svg>
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