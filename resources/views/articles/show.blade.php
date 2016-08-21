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
			<a class="btn green darken-2 valider">Valider l'article</a>
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
	<div class="s12 m12">
		<div class="col s12 m6 article-img" style="float:left">
		<img  class="responsive-img" src="{{url('/')}}/{{$article->image}}" alt="">
	</div>
		<div class="contenu"> {!!$article->contenu!!} </div>
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
			<p class="date right-align">{{$commentaire->created_at}}</p>
		</div>
		@endforeach
	</div>
	

	<div class="divider"></div>
	<div class="row load-more">
		<a onclick=loadMoreCommentaires()>
			&#x25BC; Lire plus de commentaires
		</a>
	</div>
	@endunless
	<div class="section">
	<a class="anchor" id="write"></a>
		{{Form::open(array('id'=>'comment', 'class'=>'col s12 commentaires-form','url'=>"article/$article->id/commentaire"))}}
		<h5>{{$commentaires->isEmpty() ? 'Soit le premier à laisser un commentaire' : 'Laisse toi aussi un commentaire'}}</h5>
		<div class="row">
			<div class="input-field col s12">
				<input name="auteur" id="auteur" type="text" class="validate" required>
				<label for="auteur">Auteur</label>
			</div>
			<div class="input-field col s12">
				<textarea name="contenu" id="contenu" class="materialize-textarea validate" required></textarea>
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

  <div id="modalValider" class="modal">
    <div class="modal-content">
      <h4>Valider cet article</h4>
      <p>Dans quel IK sera cet article ?</p>
      <label class="active" for="numero">Numéro</label>
      <input id="numero" type="number" class="validate" value="{{$latestik->numero +1}}">
      <div class="row center-align">
      	<a class="waves-effect waves-light blue btn valider2">Valider</a>
      </div>
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

  	moment.locale('fr');
	$('.date').each(function(){
		$(this).text( moment($(this).text()).startOf('hour').fromNow() );
	})

  	$('#badge-perso').text(article.like);

  	if(session['liked']!=null && $.inArray(article.id, session['liked'])!=1 ){
    	$('#like').addClass('disabled');
  	}
    $('.pin-top').pushpin({ top: $('.pin-top').offset().top, offset : 150, bottom:$( document ).height()-750
 	});
  });

    $(document).on('submit', '#comment', function(e) {  
        e.preventDefault();
        var auteur = $("#auteur").val();
        var contenu = $("#contenu").val();

        $.ajax({
    		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            method: 'POST',
            url: article.id+"/commentaire",
            data: {auteur : auteur, contenu : contenu },
            dataType:"json", 
        })
        .done(function(data) {
            if(data.message=="success"){
            	var html = "<div class='divider'></div><div class='section'><h5 class='small'>"+auteur+"</h5><p class='justify dotdotdot commentaire'>"+contenu+"</p></div>";
        		$('.commentaire-container').append(html);
        		$('#auteur').val('');
        		$('#contenu').val('')
                }
            else {
            	Materialize.toast('Il y a un problème...',2000,'message_error');
            }	
        })
        .fail(function(data) {
            Materialize.toast('Il y a un problème...',2000,'message_error');
            console.log(data);
        });
    });

</script>
@stop