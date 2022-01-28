@extends('layouts.app')

@section('title')
FRENDSHIP - Account
@endsection

@section('content')

<div class="container text-center">
    <div class="row my-md-3 ">
      <div class="col d-flex justify-content-center ">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-wink text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z"/>
        </svg>
         
        <h1 class="text-danger text-opacity-75 fst-italic fs-1">salut {{ $user->prenom }}  </h1>
        
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-emoji-wink text-danger text-opacity-75 mx-md-2" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z"/>
        </svg>
        
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 account">
        <div class="card d-flex flex-row">

            <div class="col-md-4 d-flex align-items-center justify-content-center">
                @if ($user->image) 
                <img src="{{ asset("images/$user->image") }}" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoUser" style="width: 10rem;">
                @else 
                <img  src="{{ asset("images/default_user.jpg") }}" class="card-img-top rounded-circle img-fluid m-md-3" alt="photoDefault" style="width: 10rem;">
                @endif
            </div>
    
            <dl class="row m-md-5 d-flex justify-content-center">
                <dt class="col-sm-3 fs-4 mb-md-3">Pseudo</dt>
                <dd class="col-sm-9 fs-3 fst-italic mb-md-3"> <mark>{{ $user->pseudo }}</mark></dd>
    
                <dt class="col-sm-3 fs-4 mb-md-3">Prenom</dt>
                <dd class="col-sm-9 fs-3 fst-italic mb-md-3"> <mark>{{ $user->prenom }}</mark></dd>
    
                <dt class="col-sm-3 fs-4 mb-md-3">Nom</dt>
                <dd class="col-sm-9 fs-3 fst-italic mb-md-3"><mark> {{ $user->nom }} </mark></dd>
    
                <dt class="col-sm-3 fs-4 mb-md-3">Mail</dt>
                <dd class="col-sm-9 fs-3 fst-italic mb-md-3"><mark> {{ $user->email }} </mark></dd>
                
                <dt class="col-sm-10 fs-4"> <a class="nav-link" href="{{ route('edit') }}"> Modiffier Mes Informations<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></a> </dd></dt>
            </dl>
        </div>
      </div>
    </div>
  </div>

@endsection