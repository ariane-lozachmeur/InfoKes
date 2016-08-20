@extends('template')

@section('title') Show @stop

@section('content')

<div class="row white bloc-padding">
	@unless($cat==null)
	<div class="article-bandeau" style="background-color:{{$cat->couleur}}">
		<h5 class="article-cat" style="color:{{$cat->couleur_police}}">{{$cat->name}}</h5>
	</div>
	@endunless
	<div class="col s12 l12 article-header">
		<h2 class="titre" style="color:{{$cat!=null ? $cat->couleur : ''}}">{{$article->titre}}</h2>
		<h5 class="auteur">par {{$article->auteur}}</h5>
		@if( isset($session['role']) && $session['role']==3)
		<div class="center">
			<a class="btn blue darken-2" href="{{url('article')}}/{{$article->id}}/edit">Editer l'article</a>
			@unless($article->relu)
			<a class="btn green darken-2 valider" data-id="{{$article->id}}">Valider l'article</a>
			@endunless
			@unless(false)
			<a class="btn red darken-2 supprimer" data-id="{{$article->id}}">Supprimer</a>
			@endunless
		</div>
		@endif
	</div>

	<div class="col s12">
		<p class="article-presentation"> {{$article->presentation}}</p>
	</div>
	<div class="col s12 m6 article-img">
		<img  class="responsive-img" src="{{url('/')}}/{{$article->image}}" alt="">
	</div>
	<div class="s12 m12">
		<p class="contenu"> {!!$article->contenu!!} </p>
	</div>

</div>

<div class="row white bloc-padding">
	<h5>Commentaires</h5>
	@unless($commentaires->isEmpty())
	<div class="commentaire-container">
		@foreach($commentaires as $commentaire)
		<div class="divider"></div>
		<div class="section">
			<h5 class="small">{{$commentaire->auteur}}</h5>
			<p class="justify commentaire">{{$commentaire->contenu}}</p>
		</div>
		@endforeach
	</div>
	@endunless

	<div class="divider"></div>
	<a id="load-more" class="black-text" onclick=loadMoreCommentaires() data-page=1>
		<div class="plus-commentaires">Lire plus de commentaires</div>
	</a>
	
	<div class="section">
	<a class="anchor" id="write"></a>
		{{Form::open(array('class'=>'col s12 commentaires-form','url'=>"article/$article->id/commentaire"))}}
		<h5>{{$commentaires->isEmpty() ? 'Soit le premier à laisser un commentaire' : 'Laisse toi aussi un commentaire'}}</h5>
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

<div id="modalSupprimer" class="modal">
    <div class="modal-content">
      <h4 id="titre"></h4>
      <p id="contenu"></p>
    </div>
    <div class="modal-footer">
      <a href="#" id="confirm-supprimer" class="modal-action modal-close waves-effect waves-green btn-flat blue-text">Supprimer</a>
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat blue-text">Conserver</a>
    </div>
  </div>
@stop

@section('side')
<div class="pin-top">
	<a class="waves-effect waves-light btn blue darken-1 side-btn" id="like"><span id="badge-perso"></span><i class="material-icons left">thumb_up</i>Liker</a>
	<a class="waves-effect waves-light btn blue darken-1 side-btn" href="#write"><i class="material-icons left">mode_edit</i>Commenter</a>
		<div class="card-panel white">
	    <span class="black-text">
	    	Lire aussi :
	    </span>
	    <ul>
	    @foreach($linkedArticles as $linked)
	        <li><a href="{{url('article')}}/{{$linked->id}}">{{$linked->titre}}</a></li>
	    @endforeach
	    </ul>
	</div>
</div>
@stop

@section('footer')
<script type="text/javascript">
	var article = {!! json_encode($article)!!};
	var commentaires = {!! json_encode($commentaires)!!};
	var session = {!! json_encode($session)!!};

  $(document).ready(function(){

  	$('#badge-perso').text(article.like);

  	console.log(session);
  	console.log(article.id);

    $('.pin-top').pushpin({ top: $('.pin-top').offset().top, offset : 150, bottom:$( document ).height()-750
 	});
  });
</script>
@stop