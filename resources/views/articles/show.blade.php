@extends('template')

@section('title') Show @stop

@section('content')

	<div class="row white bloc-padding">
	<div class="article-bandeau" style="background-color:{{$cat->couleur}}">
		<h5 class="article-cat" style="color:{{$cat->couleur_police}}">{{$cat->name}}</h5>
	</div>
	<div class="col s12 l12 article-header">
		<h2 class="titre" style="color:{{$cat->couleur}}">{{$article->titre}}</h2>
		<h5 class="auteur">par {{$article->auteur}}</h5>
		<a class="btn blue darken-2 centrer" href="{{url('article')}}/{{$article->id}}/edit">Editer l'article</a>
	</div>

	<div class="col s12">
		<p class="article-presentation"> {{$article->presentation}}</p>
	</div>
	<div class="col s12 m4 article-img">
		<img  class="responsive-img" src="{{url('img/sample.jpg')}}" alt="">
	</div>
	<div class="s12 m12">
		<p class="contenu"> {{$article->contenu}} </p>
	</div>

	</div>

@stop