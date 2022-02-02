@extends('layouts.app')

@section('title')
FRENDSHIP - search
@endsection

@section('content')

@if(($results->count()<=0))

<div class="container my-md-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="alert alert-danger d-flex align-items-center  justify-content-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                      </svg>
                    <div class="fs-1 fw-bold ">
                        {{ __('aucun resultat') }}
                    </div>
                  </div>
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