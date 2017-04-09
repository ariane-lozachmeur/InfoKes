@extends('template')

@section('title') Poster une khote @stop

@section('content')

		<div class="row white form-container bloc-padding">
		<h3>Poste ta khote</h3>
		{{Form::open(array('class'=>'col s12','url'=>'khote'))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="auteur" type="text" class="validate" placeholder="N'oublie pas de placer toi même les * dans le nom de la personne citée ;)" required>
						<label for="auteur">Auteur</label>
					</div>
					<div class="input-field col s12">
						<textarea name="contenu" class="materialize-textarea validate" required></textarea>
						<label for="contenu">Citation</label>
					</div>
					<div class="input-field col s12 center-align">
						<input type="submit" class="btn blue darken-3" value="Poster">
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>

@stop