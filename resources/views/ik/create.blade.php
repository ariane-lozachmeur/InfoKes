@extends('template')
@section('title') InfoKès @stop

@section('content')

<div class="row white bloc-padding">
	<h3> Poste le nouvel IK</h3>
		{{Form::open(array('class'=>'col s12','id'=>'formIK', 'url'=>'ik','files' => true))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="numero" id="numero" type="number" class="{!! $errors->has('numero') ? 'invalid' : '' !!}" value="{{old('numero')}}">
						<label for="numero">Numéro</label>
						{!! $errors->first('numero', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<input name="titre" id="titre" type="text" class="{!! $errors->has('titre') ? 'invalid' : '' !!}" value="{{old('titre')}}">
						<label for="titre">Titre</label>
						{!! $errors->first('titre', '<small class="error-message">:message</small>') !!}
					</div>
					<p>Upload le PDF de l'IK !</p>
					<div class="file-field input-field">
						<div class="btn blue darken-3">
							<span>Fichier</span>
							<input type="file" name="pdf">
						</div>
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
						<input id="published_at" name="published_at" type="date" class="datepicker {!!$errors->has('date') ? 'invalid' : '' !!}" value="{{Carbon\Carbon::today()->toDateString()}}">
						<label for="published_at">Date de publication</label>
						{!! $errors->first('date', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12 center-align">
						<input type="submit" class="btn blue darken-3" value="Publier">
					</div>
				</div>
			{{Form::close()}}
</div>

@stop

@section('footer')

<script>
	var categories = {!!json_encode($categories)!!};
</script>

@stop
