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

	<div class="row white bloc-padding">
		<h5>Commentaires</h5>
		@foreach($commentaires as $commentaire)
		<div class="divider"></div>
		<div class="section">
		<h5 class="small">{{$commentaire->auteur}}</h5>
			<p class="justify dotdotdot commentaire">{{$commentaire->contenu}}</p>
		</div>
		@endforeach

		<div class="divider"></div>
		<a href="#load-more" id="load-more"class="black-text" onclick=loadMoreCommentaires()><div class="plus-commentaires">Lire plus de commentaires</div></a>
			<div class="section">
			{{Form::open(array('class'=>'col s12 commentaires-form','url'=>"article/$article->id/commentaire"))}}
			<h5>Laisse toi aussi un commentaire</h5>
				<div class="row">
					<div class="input-field col s12">
						<input name="auteur" type="text" class="validate">
						<label for="auteur">Auteur</label>
					</div>
					<div class="input-field col s12">
						<textarea name="contenu" class="materialize-textarea validate"></textarea>
						<label for="contenu">Ton commentaire</label>
					</div>
					<div class="input-field col s12 center-align">
						<input type="submit" class="btn blue darken-3" value="Commenter">
					</div>
				</div>
			{{Form::close()}}
			</div>
		</div>	
	</div>

	<script type="text/javascript">
		var article = {!! json_encode($article)!!};
		var commentaires = {!! json_encode($commentaires)!!};
	</script>

@stop