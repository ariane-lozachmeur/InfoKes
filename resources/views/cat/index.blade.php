@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	<a class="btn waves-effect waves-light blue darken-2 centrer" href="{{url('categorie')}}/create">Créer une nouvelle rubrique</a>
	<br>
	@foreach($categories as $cat)
	<div class="col s6 m3">
		<div class="card">
			<div class="card-content" style="background-color:{{$cat->couleur}};color:{{$cat->couleur_police}}">
			<a class="btn-flat btn-floating delete right" data-name="{{$cat->name}}" data-id="{{$cat->id}}"><i class="close material-icons">close</i></a>
				<p class="dotdotdot rubrique-index">{{$cat->name}}</p>
			</div>
			<div class="card-action">
				<a class="blue-text" href="{{url('categorie')}}/{{$cat->id}}/edit">Modifier</a>
			</div>
		</div>
	</div>
	@endforeach
</div>

<!-- Modal d'avetissement pour la suppresion d'une catégorie-->
<div id="modalDelete" class="modal">
    <div class="modal-content">
      <h4 id="titre"></h4>
      <p id="contenu"></p>
    </div>
    <div class="modal-footer">
    <a class="confirm modal-action modal-close waves-effect waves-green btn-flat blue-text">Supprimer</a>
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat blue-text">Conserver</a>
    </div>
  </div>
  <!-- Fin du modal-->
@stop

@section('footer')

@stop
