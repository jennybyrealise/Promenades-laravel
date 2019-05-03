@extends('layouts.app')

@section('content')

<div class="container">

    <h2>{{$post->title}}</h2>
    <div>
        <img src="/storage/img/{{$post->photo}}" alt="">
    </div>
    <div>
        {{$post->depart}} {{$post->duree}}  {{$post->pourFamille}}
    </div>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Promenade de {{$post->author}},le {{$post->created_at}} </small>
    <hr>
    <div class="d-flex justify-content-around">
        <a href="/promenades/{{$post->id}}/edit" class="btn btn-default">Edit</a>
        
        {{Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST' ,'class' => 'pull-right'])}}
        
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=> 'btn btn-default'])}}
        
        {{Form::close()}}
        
        <a href="/promenades" class="btn btn-default">Go Back</a>
    </div>

 </div>
    
    @endsection