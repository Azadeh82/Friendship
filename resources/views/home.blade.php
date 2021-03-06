@extends('layouts.app')

@section('title')
FRENDSHIP - Accueil
@endsection

@section('content')
<div class="container text-center">
    <div class="row my-md-3 ">
      <div class="col d-flex justify-content-center ">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger  mx-md-2" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger  mx-md-2" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
        </svg>
  
        <h1 class="text-danger fst-italic fs-1">Bienvenu sur Friendship </h1>
        
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger  mx-md-2" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-heart-eyes text-danger  mx-md-2" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
        </svg>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card mb-md-5">
          <div class="card-body rounded messageframe border border-danger border-3">
            <div class="card-body">
                <form method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3 d-flex flex-column">
                        <label for="message" class="col-md-10 col-form-label mx-auto fw-bold fs-5">{{ __('Ecris un truc sympa (ou pas) ') }}</label>

                        <div class="col-md-10 mx-auto">
                            <textarea class="form-control" id="floatingTextarea " placeholder = "Message" rows="3" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" autofocus></textarea>

                            @error('message')
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

                    <div class="col d-flex flex-column justify-content-center my-md-3">
                        <label for="tags" class="col col-form-label fw-bold fs-6">{{ __('Ajoute des tags') }}</label>
    
                            <div class="col-md-6 mx-auto">
                                <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" required autocomplete="tags" autofocus placeholder = "#Tags">
    
                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Message') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>



@foreach ($messages as $message)
<div class="container text-center my-md-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card-body rounded bgmessage border border-danger border-3 bg-success">
                <div class="card d-flex flex-row justify-content-center">
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                        @if ($message->user->image) 
                        <img src="/images/{{$message->user->image}}" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoUser" style="width: 7rem;">
                        @else 
                        <img  src="/images/default_user.jpg" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoDefault" style="width: 7rem;">
                        @endif
        
                        <a href="{{route('profile' , $message->user_id)}}"><h3>{{ $message->user->prenom }}</h3></a>
                    </div>
                    <div class= " col-md-8 d-flex flex-row align-items-center">
                        <p class="col-md-4 fw-bold mb-md-3">{{ $message->tags }}</></p>
                        <p class="col-md-4 mb-md-3 mx-auto fs-7">post?? {{$message->created_at}}</></p>
                    </div>
                </div>

                <div class="card">
                    @if ($message->image) 
                    <img class="col-md-6 card-img-top img-fluid" src="/images/{{ $message->image }}" alt="imgpost">
                    @endif
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $message->message }}</h5>
                        <p class=""><a href="">Zoom sur message</a></p>
                        <div class="col d-flex flex-row d-flex justify-content-around ">
                            <a href="{{ route('comments.create', $message->id) }}" class="btn btn-danger">Commenter</a>
                                
                            @can('update',$message)
                            <a href="{{route('messages.edit' , $message)}}" class="btn btn-danger">Modifier</a>
                            @endcan
    
                            @can('delete', $message)
                            <form method="POST" action="{{route('messages.destroy' , $message)}}">
                            @csrf
                            @method('DELETE')   
                                <button type="submit" class="btn btn-danger">supprimer</button>          
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@foreach ($message->comments as $comment)

<div class="container text-center my-md-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card-body rounded bgcomment border border-danger border-3 bg-success">
                <div class="card d-flex flex-row justify-content-center">
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                        @if ($comment->user->image)  
                        <img src="/images/{{$comment->user->image}}" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoUser" style="width: 7rem;">
                        @else 
                        <img  src="/images/default_user.jpg" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoDefault" style="width: 7rem;">
                        @endif
        
                        <a href="{{route('profile' , $comment->user)}}"><h3>{{ $comment->user->prenom }}</h3></a>
                    </div>
                    <div class= " col-md-8 d-flex flex-row align-items-center">
                        <p class="col-md-4 fw-bold mb-md-3">{{ $comment->tags }}</></p>
                        <p class="col-md-4 mb-md-3 mx-auto fs-7">post?? {{$comment->created_at}}</></p>
                    </div>
                </div>

                <div class="card">
                    @if ($comment->image) 
                    <img class="col-md-6 card-img-top img-fluid" src="/images/{{ $comment->image }}" alt="imgcomment">
                    @endif
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $comment->content }}</h5>
                        
                        <div class="col d-flex flex-row d-flex justify-content-around ">
                                
                            @can('update', $comment)
                            <a href="{{route('comments.edit' , $comment)}}" class="btn btn-danger">Modifier</a>
                            @endcan
    
                            @can('delete', $comment)
                            <form method="POST" action="{{route('comments.destroy' , $comment)}}">
                            @csrf
                            @method('DELETE')   
                                <button type="submit" class="btn btn-danger">supprimer</button>          
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  
@endforeach

@endforeach


{{ $messages->links() }}

@endsection























