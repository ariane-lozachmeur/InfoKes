@extends('template')

@section('title') Edit @stop

@section('content')

{{Form::open(array('class'=>'col s12','files'=>true, 'action' => array('ArticleController@update',$article->id)))}}
	<div class="row white article-container bloc-padding">
		<div class="col s12 l12 article-header">
			<div class="input-field col s12">
				<input name="titre" type="text" class="validate {!! $errors->has('titre') ? 'invalid' : '' !!}" value="{{$article->titre}}">
				<label for="titre">Titre</label>
				{!! $errors->first('titre', '<small class="error-message">:message</small>') !!}
			</div>
			<div class="input-field col s12">
				<input name="auteur" type="text" class="validate {!! $errors->has('auteur') ? 'invalid' : '' !!}" value="{{$article->auteur}}">
				<label for="auteur">Auteur(s)</label>
				{!! $errors->first('auteur', '<small class="error-message">:message</small>') !!}
			</div>
		</div>
		<div class="col s12">
			<div class="input-field col s12">
				<textarea name="presentation" class="materialize-textarea {!! $errors->has('presentation') ? 'invalid' : '' !!}">{{$article->presentation}}</textarea>
				<label for="presentation">Présentation de l'article</label>
				{!! $errors->first('presentation', '<small class="error-message">:message</small>') !!}
			</div>
		</div>
		<div class="s12 m12">
			<div class="input-field col s12">
				<textarea id="textarea" name="contenu" class="materialize-textarea {!! $errors->has('contenu') ? 'invalid' : '' !!}">{{$article->contenu}}</textarea>
				<label for="contenu" class="active">Contenu de l'article</label>
				{!! $errors->first('contenu', '<small class="error-message">:message</small>') !!}
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
		{!! $errors->first('cat_id', '<small class="error-message">:message</small>') !!}
	</div>
		<div class="col s12 m4 article-img">
			<img  class="responsive-img" src="{{url('/')}}/{{$article->image}}" alt="">
		</div>
		<p>Tu peux aussi changer la photo illustrant l'article.</p>
		<div class="file-field input-field">
			<div class="btn blue darken-3">
				<span>Photos</span>
				<input type="file" name="image">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path {!! $errors->has('image') ? 'invalid' : '' !!}" type="text" placeholder="Upload une ou plusiers photos pour illuster ton article" multiple>
			</div>
			{!! $errors->first('image', '<small class="error-message">:message</small>') !!}
		</div>
		<div class="input-field col s12 center-align">
			<input type="submit" class="btn blue darken-3" value="Publier">
		</div>
	</div>
{{Form::close()}}

	@stop