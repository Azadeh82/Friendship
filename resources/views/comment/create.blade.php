@extends('layouts.app')

@section('title')
FRENDSHIP - Créer un commentaire
@endsection

@section('content')

<div class="container index text-center">
  <div class="row my-md-5 ">
    <div class="col d-flex justify-content-center ">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
      </svg>

      <h1 class="text-danger text-opacity-75 fst-italic fs-1">Ajouter un commentaire </h1>
      
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
      </svg>
    </div>
  </div>
  <div class="row d-flex justify-content-center ">
    <div class="col-md-8">
      <div class="card mb-md-5">
        <div class="card-body shadow-lg bg-body rounded">
          <div class="card-body">
              <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="row mb-3 d-flex flex-column">
                    <label for="content" class="col-md-10 col-form-label mx-auto fw-bold fs-6">{{ __('Tape ton commentaire') }}</label>

                    <div class="col-md-10 mx-auto">
                        <textarea class="form-control" id="floatingTextarea " placeholder = "Comment" rows="3" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus></textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="row mb-3 d-flex flex-column">
                    <label for="tags" class="col col-form-label fw-bold fs-6">{{ __('Ajoute des tags') }}</label>

                      <div class="col-md-8 mx-auto">
                          <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" required autocomplete="tags" autofocus placeholder = "Salut">

                          @error('tags')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div> 
                  </div>
                
                  <div class="row my-md-3">
                    <div class="col d-flex flex-column justify-content-center">
                        <label for="image" class="col-form-label fw-bold fs-6 text-center">{{ __('Ajoute une image') }}</label>

                            <div class="col-md-6 d-flex flex-row mx-auto">
                                <div class="col-md-10 mx-auto">

                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus placeholder = "Uploaud un image">
                                    

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                    </div>
                </div>

                  <input type="hidden" name="messageid" value="{{$id}}">

                  <div class="row">
                      <div class="col-md-6 mx-auto">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Valider') }}
                          </button>
                          <button type="submit" class="btn btn-primary">
                            {{ __('Annuler') }}
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