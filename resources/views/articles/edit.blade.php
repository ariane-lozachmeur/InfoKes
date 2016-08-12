@extends('template')

@section('title') Edit @stop

@section('content')

{{Form::open(array('class'=>'col s12','action' => array('ArticleController@update',$article->id)))}}
	<div class="row white article-container">
		<div class="article-bandeau" style="background-color:{{$cat->couleur}}">
			<h5 class="article-cat" style="color:{{$cat->couleur_police}}">{{$cat->name}}</h5>
		</div>
		<div class="col s12 l12 article-header">
			<div class="input-field col s12">
				<input name="titre" type="text" class="validate h2 article-titre" value="{{$article->titre}}">
				<label for="titre">Titre</label>
			</div>
			<div class="input-field col s12">
				<input name="auteur" type="text" class="validate" value="{{$article->auteur}}">
				<label for="auteur">Auteur(s)</label>
			</div>
		</div>
		<div class="col s12">
			<div class="input-field col s12">
				<textarea name="presentation" class="materialize-textarea validate">{{$article->presentation}}</textarea>
				<label for="presentation">Présentation de l'article</label>
			</div>
		</div>
		<div class="s12 m12">
			<div class="input-field col s12">
				<textarea name="contenu" class="materialize-textarea validate">{{$article->contenu}}</textarea>
				<label for="contenu">Contenu de l'article</label>
			</div>
		</div>
		<div class="input-field col s12">
			<select name="cat_id">
			<option value="" disabled selected>Choisi la rubrique dans laquelle ton veux publier ton article</option>
			@foreach($categories as $cat)
				@unless($cat->id==$article->cat_id)
				<option class="blue-text darken-3" value="{{$cat->id}}">{{$cat->name}}</option>
				@else
				<option class="blue-text darken-3" value="{{$cat->id}}" selected>{{$cat->name}}</option>
				@endunless

			@endforeach
		</select>
		<label>Rubrique</label>
	</div>
		<div class="col s12 m4 article-img">
			<img  class="responsive-img" src="{{url('img/sample.jpg')}}" alt="">
		</div>
		<p>Tu peux aussi changer la photo illustrant l'article.</p>
		<div class="file-field input-field">
			<div class="btn blue darken-3">
				<span>Photos</span>
				<input type="file" name="image">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text" placeholder="Upload une ou plusiers photos pour illuster ton article" multiple>
			</div>
		</div>
		<div class="input-field col s12 center-align">
			<input type="submit" class="btn blue darken-3" value="Publier">
		</div>
	</div>
{{Form::close()}}

	@stop