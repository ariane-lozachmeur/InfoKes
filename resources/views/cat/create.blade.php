@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	<div class="row white form-container bloc-padding">
		<h3>Créer une nouvelle catégorie</h3>
		{{Form::open(array('class'=>'col s12','url'=>'categorie'))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="name" type="text" class="validate">
						<label for="name">Nom de la rubrique</label>
					</div>
					<div class="input-field col s12">
						<input name="couleur" type="color" class="validate">
						<label for="couleur">Couleur de la rubrique</label>
					</div>
					<div class="input-field col s12">
						<input name="couleur_police" type="color" class="validate">
						<label for="couleur_police">Couleur de la police (pour être visible sur le fond)</label>
					</div>
					<div class="input-field col s12 center-align">
						<input type="submit" class="btn blue darken-3" value="Créer">
					</div>
				</div>
			{{Form::close()}}
		</div>
</div>
@stop

@section('footer')

@stop

