@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	<div class="row white form-container bloc-padding">
		<h3>Éditer {{$categorie->name}}</h3>
		{{Form::open(array('class'=>'col s12','action' => array('CatController@update',$categorie->id)))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="name" type="text" value="{{$categorie->name}}"class="validate">
						<label for="name">Nom de la rubrique</label>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input name="couleur" type="color" class="validate color-input btn-flat" value="{{$categorie->couleur}}">
							<label for="couleur" class="active">Couleur de la rubrique</label>
						</div>
						<div class="input-field col s6">
							<input name="couleur_police" type="color" class="validate color-input btn-flat" value="{{$categorie->couleur_police}}">
							<label for="couleur_police" class="active">Couleur de la police</label>
						</div>
					</div>
					<div class="input-field col s12 center-align">
						<input type="submit" class="btn blue darken-3" value="Modifier">
					</div>
				</div>
			{{Form::close()}}
		</div>
</div>
@stop

@section('footer')

@stop

