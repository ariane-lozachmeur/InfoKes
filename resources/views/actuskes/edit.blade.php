@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	<div class="row white form-container bloc-padding">
		<h3>Éditer l'actu : {{$actu->titre}}</h3>
		{{Form::open(array('class'=>'col s12','action' => array('ActusKesController@update',$actu->id)))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="titre" type="text" class="{!! $errors->has('titre') ? 'invalid' : '' !!}" value="{{$actu->titre}}">
						<label for="titre">Titre</label>
						{!! $errors->first('titre', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<label for="contenu" class="active">Écrit ton message ici</label>
						<textarea id="textarea" name="contenu">{!!$actu->contenu!!}</textarea>
						{!! $errors->first('contenu', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_at" type="date" class="datepicker {!! $errors->has('published_at') ? 'invalid' : '' !!}" value="{{$actu->published_at}}">
						<label for="published_at">Date de publication</label>
						{!! $errors->first('published_at', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_until" type="date" class="datepicker {!! $errors->has('publisjed_until') ? 'invalid' : '' !!}" value="{{$actu->published_until}}">
						<label for="published_at">Publié jusqu'à </label>
						{!! $errors->first('published_until', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12 center-align">
					<input type="submit" class="btn blue darken-3" value="Poster">
					<a class="btn red deleteActu" data-id="{{$actu->id}}">Supprimer</a>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop

@section('footer')

@stop

