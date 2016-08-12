@extends('template')

@section('title') Écrire une news Kès @stop

@section('content')


		<div class="row white form-container">
		{{Form::open(array('class'=>'col s12','url'=>'actuskes'))}}
				<div class="row">
				<div class="input-field col s12">
					    <select name="poste">
					      <option value="" disabled selected>Quel kessier est-tu ?</option>
					      @foreach($postes as $poste)
					      <option class="blue-text darken-3" value="{{$poste}}">{{$poste}}</option>
						@endforeach
					    </select>
					    <label>Poste</label>
					 </div>
					<div class="input-field col s12">
						<input name="titre" type="text" class="validate">
						<label for="titre">Titre</label>
					</div>
					<div class="input-field col s12">
					<textarea name="contenu" class="materialize-textarea validate"></textarea>
					<label for="contenu">Message</label>
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_at" type="date" class="datepicker">
						<label for="published_at">Date de publication</label>
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_until" type="date" class="datepicker">
						<label for="published_at">Publié jusqu'à </label>
					</div>
					<div class="input-field col s12 center-align">
					<input type="submit" class="btn blue darken-3" value="Poster">
				</div>
			{{Form::close()}}
		</div>

	</div>

@stop