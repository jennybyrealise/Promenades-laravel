@extends('layouts.app')

@section('content')
    <h1>Créer votre promenade</h1>
    <div class="container">

        {{-- avec ca ci-dessous on a le tag form et la sécurité du formulaire --}}
        {{ Form::open(['action' => 'PostController@store', 'method' =>'POST', 'enctype' => 'multipart/form-data']) }} {{-- c la page ou il va l'envoyer --}}
        <div class="form-group">
            {{Form::label('title','Titre')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'Entrez votre titre'])}} <br>
            
            {{Form::label('photo', 'Photo')}}
            {{Form::file('photo', ['class' => 'control-label'])}} <br>
            
            {{Form::label('depart','Départ')}}
            {{Form::text('depart','',['class' => 'form-control','placeholder' => 'Départ'])}} <br>
            
            {{Form::label('duree','Durée en (min)')}}
            {{Form::number('duree','',['class' => 'form-control','placeholder' => 'Durée'])}} <br>
            
            {{Form::label('pourFamille','Idéal pour famille')}}
            {{Form::checkbox('pourFamille',1)}} <br>

            {{Form::label('body','Description')}}
            {{Form::textarea('body','',[/* 'id'=>'article-ckeditor', */'class' => 'form-control','placeholder' => 'Entrez votre texte'])}}
            
            {{Form::label('author','Autheur')}}
            {{Form::text('author','',['class' => 'form-control','placeholder' => 'Entrez votre nom'])}}
            
            {{Form::submit('Submit',['class' => 'btn btn-primary center'])}} <br>
        </div>
        {{ Form::close() }}
    </div>
        @endsection