@extends('layouts.app')

@section('title')
    FRENDSHIP - Profile
@endsection

@section('content')

    <div class="container text-center">
        <div class="row my-md-3 ">
            <div class="col d-flex justify-content-center ">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-emoji-wink text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z" />
                </svg>

                <h1 class="text-warning fst-italic fs-1">profile de {{ $user->prenom }} {{$user->nom}}</h1>

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-emoji-wink text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z" />
                </svg>

            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 align-items-center justify-content-center">
                @if ($user->image) 
                <img src="/images/{{$user->image}}" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoUser" style="width: 20rem;">
                @else 
                <img  src="/images/default_user.jpg" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoDefault" style="width: 20rem;">
                @endif
            </div>
        </div>
    </div>


    @foreach ($user->messages as $message)
    
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
                            <p class="col-md-4 mb-md-3 mx-auto fs-7">posté {{$message->created_at}}</></p>
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
                            <p class="col-md-4 mb-md-3 mx-auto fs-7">posté {{$comment->created_at}}</></p>
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
