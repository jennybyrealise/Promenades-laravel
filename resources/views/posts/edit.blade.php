@extends('layouts.app')

@section('content')
    <h1>Create post</h1>
   {{-- avec ca ci-dessous on a le tag form et la sécurité du formulaire --}}
    {{ Form::open(['action' => ['PostController@update',$post->id], 'method' =>'POST', 'files' => true]) }} 
        <div class="forn-group">
            {{Form::label('title','Titre')}}
            {!!Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Entrez votre titre'])!!}
        </div> 
        <div>
            {{Form::label('photo', 'Photo')}}
            <img src="/storage/img/{{$post->photo}}" alt="">
            {{Form::file('photo', ['class' => 'control-label'])}}
        </div>
        <div>
            {{Form::label('depart','Départ')}}
            {!!Form::text('depart',$post->depart,['class' => 'form-control','placeholder' => 'Départ'])!!}
        </div>
        <div>
            {{Form::label('duree','Durée')}}
            {!!Form::number('duree',$post->duree,['class' => 'form-control','placeholder' => 'Arrivée'])!!}
        </div>
        <div>
            {{Form::label('pourFamille','Idéale pour famille')}}
            {{Form::checkbox('pourFamille',1,$post->pourFamille)}}
        </div>
        <div>
            {{Form::label('body','Description')}}
            {!!Form::textarea('body',$post->body,[/* 'id'=>'article-ckeditor', */'class' => 'form-control','placeholder' => 'Entrez votre texte'])!!}
        </div>
        <div>  
            {{Form::label('author','Autheur')}}
            {!!Form::text('author',$post->author,['class' => 'form-control','placeholder' => 'Enter your nom'])!!}
        </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
@endsection