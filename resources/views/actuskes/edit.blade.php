@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	<div class="row white form-container bloc-padding">
		<h3>Éditer l'actu : {{$actu->titre}}</h3>
		{{Form::open(array('class'=>'col s12','action' => array('ActusKesController@update',$actu->id)))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="titre" type="text" class="validate" value="{{$actu->titre}}">
						<label for="titre">Titre</label>
					</div>
					<div class="input-field col s12">
					<textarea name="contenu" class="materialize-textarea validate">{{$actu->contenu}}</textarea>
					<label for="contenu">Message</label>
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_at" type="date" class="datepicker" value="{{$actu->published_at}}">
						<label for="published_at">Date de publication</label>
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_until" type="date" class="datepicker" value="{{$actu->published_until}}">
						<label for="published_at">Publié jusqu'à </label>
					</div>
					<div class="input-field col s12 center-align">
					<input type="submit" class="btn blue darken-3" value="Poster">
					<a class="btn red deleteActu" data-id="{{$actu->id}}">Supprimer</a>
				</div>
			{{Form::close()}}
		</div>
</div>
@stop

@section('footer')

@stop

