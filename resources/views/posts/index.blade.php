@extends('layouts.app')

@section('content')

<div class="container ">

    <h1>Promenons-Nous</h1>

    @if(count($posts)>0)
    @foreach($posts as $post)
         <div class="well">
            {{-- $photo = img/photo1.jpeg; --}}
            <h3 class="text-center"><a href="/promenades/{{$post->id}}">{{$post->title}}</a></h3>
            <div class="text-center">
                <img src="/storage/img/{{$post->photo}}" alt="Hello">
            </div>
            <div id="rencontre" class="d-flex justify-content-around">
                <p><span>{{$post->depart}} </span></p>
                <p><span>{{$post->duree}} </span></p>
                @if($post->pourFamille === 1)
                <p><span>{{$post->pourFamille}}</span></p>
                <p>Idéal pour famille</p> 
                @else 
                <p>Promenade adulte</p>
                @endif 
            </div>
            <p>{{$post->body}}</p>
            <div class="d-flex justify-content-end">
                <small>Promenade de {{$post->author}},le {{$post->created_at}} </small>
            </div>
    </div>
    @endforeach
  
    {{$posts->links()}}

    @else
    <p>Aucune promenade trouvée</p>
    
    @endif
</div>

    @endsection