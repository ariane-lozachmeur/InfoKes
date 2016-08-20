@extends('template')
@section('title') InfoKès @stop

@section('content')

<div class="row white bloc-padding">
	<h3 class="center">Éditer l'IK {{$thisik->titre}}</h3>
		{{Form::open(array('class'=>'col s12','id'=>'formIK', 'action' => array('IKController@update',$thisik->numero),'files' => true))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="titre" id="titre" type="text" class="{!! $errors->has('titre') ? 'invalid' : '' !!}" value="{{$thisik->titre}}">
						<label for="titre">Titre</label>
						{!! $errors->first('titre', '<small class="error-message">:message</small>') !!}
					</div>
					<p>Tu peux updater le PDF</p>
					<div class="file-field input-field">
						<div class="btn blue darken-3">
							<span>Fichier</span>
							<input type="file" name="pdf">
						</div>
						<p>Ou la Une</p>
						<div class="file-path-wrapper">
							<input class="file-path {!!$errors->has('pdf') ? 'invalid' : '' !!}" type="text" placeholder="Poste l'IK ici">
						</div>
						{!! $errors->first('pdf', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="file-field input-field">
						<div class="btn blue darken-3">
							<span>Image</span>
							<input type="file" name="une">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path {!!$errors->has('une') ? 'invalid' : '' !!}" type="text" placeholder="Poste la Une ici">
						</div>
						{!! $errors->first('une', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<input id="published_at" name="published_at" type="date" class="datepicker {!!$errors->has('date') ? 'invalid' : '' !!}" value="{{$thisik->published_at}}">
						<label for="published_at">Date de publication</label>
						{!! $errors->first('published_at', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12 center-align">
						<input type="submit" class="btn blue darken-3" value="Publier">
						<a class="waves-effect waves-light btn red modal-trigger" href="#modalIK">Supprimer</a>
					</div>
				</div>
			{{Form::close()}}
</div>

<div id="modalIK" class="modal">
    <div class="modal-content">
    	<h4>Supprimer l'IK</h4>
    	<p>Est-tu sûr de vouloir supprimer cet IK ? Cette opération est irréversible.</p>
    </div>
    <div class="modal-footer">
    	<a href="#" id="delete-ik" class="modal-action modal-close waves-effect waves-green btn-flat blue-text" data-id="{{$thisik->numero}}">Supprimer</a>
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat blue-text">Conserver</a>
    </div>
</div>

@stop

@section('footer')

<script>
	var categories = {!!json_encode($categories)!!};
</script>

@stop
