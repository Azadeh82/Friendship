@extends('layouts.app')

@section('title')
FRENDSHIP - search
@endsection

@section('content')

@if(($results->count()<=0))

<div class="container my-md-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-5 fw-bolder">{{ __('aucun resultat') }}</div>
            </div>
        </div>
    </div>
</div>

@else

<div class="container my-md-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-5 fw-bolder">{{ __('Resultat de la Rocherche') }}</div>
            </div>
        </div>
    </div>
</div>


@foreach($results as $message)

<div class="container text-center my-md-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card-body rounded bgmessage border border-danger border-3 bg-success">
                <div class="card d-flex flex-row justify-content-center mt-5 ">
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                        @if ($message->user->image) 
                        <img src="images/{{$message->user->image}}" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoUser" style="width: 7rem;">
                        @else 
                        <img  src="images/default_user.jpg" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoDefault" style="width: 7rem;">
                        @endif
        
                        <h3>{{ $message->user->prenom }}</h3>
                    </div>
                    <div class= " col-md-8 d-flex flex-row align-items-center">
                        <p class="col-md-4 fw-bold mb-md-3">{{ $message->tags }}</></p>
                        <p class="col-md-4 mb-md-3 mx-auto fs-7">posté {{$message->created_at}}</></p>
                    </div>
                </div>

                <div class="card">
                    @if ($message->image) 
                    <img class="col-md-6 card-img-top img-fluid" src="images/{{ $message->image }}" alt="imgpost">
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
                <div class="card d-flex flex-row justify-content-center mt-5 ">
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                        @if ($comment->user->image)  
                        <img src="images/{{$comment->user->image}}" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoUser" style="width: 7rem;">
                        @else 
                        <img  src="images/default_user.jpg" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoDefault" style="width: 7rem;">
                        @endif
        
                        <h3>{{ $comment->user->prenom }}</h3>
                    </div>
                    <div class= " col-md-8 d-flex flex-row align-items-center">
                        <p class="col-md-4 fw-bold mb-md-3">{{ $comment->tags }}</></p>
                        <p class="col-md-4 mb-md-3 mx-auto fs-7">posté {{$comment->created_at}}</></p>
                    </div>
                </div>

                <div class="card">
                    @if ($comment->image) 
                    <img class="col-md-6 card-img-top img-fluid" src="images/{{ $comment->image }}" alt="imgcomment">
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

@endif
{{ $results->links() }}
@endsection