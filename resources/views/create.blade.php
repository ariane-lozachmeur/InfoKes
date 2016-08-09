@extends('template')

@section('title') Rédiger un article @stop

@section('content')

<div class="container">
	<div class="section">
		<div class="row white form-container">
			<form class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<input id="titre" type="text" class="validate">
						<label for="titre">Titre</label>
					</div>
					<div class="input-field col s12">
						<input id="auteur" type="text" class="validate">
						<label for="auteur">Auteur(s)</label>
					</div>
					 <div class="input-field col s12">
					    <select>
					      <option value="" disabled selected>Choisi la rubrique dans laquelle ton veux publier ton article</option>
					      <option class="blue-text darken-3" value="1">Option 1</option>
					      <option class="blue-text darken-3" value="2">Option 2</option>
					      <option class="blue-text darken-3" value="3">Option 3</option>
					    </select>
					    <label>Rubrique</label>
					 </div>
					<div class="input-field col s12">
						<textarea id="description" class="materialize-textarea validate"></textarea>
						<label for="description">Présentation de l'article</label>
					</div>
					<div class="input-field col s12">
						<textarea id="corps" class="materialize-textarea validate"></textarea>
						<label for="corps">Écrit ton article ici</label>
					</div>
					<p>Ou upload un fichier Word ou OpenOffice (mais ton article ne sera pas immédiatement sur le site).</p>
					<div class="file-field input-field">
						<div class="btn blue darken-3">
							<span>Upload</span>
							<input type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
					<div class="input-field col s12">
						<input id="date" type="date" class="datepicker">
						<label for="date">Date de publication</label>
					</div>
					<div class="input-field col s12 center-align">
					<input type="submit" class="btn blue darken-3" value="Publier">
				</div>
			</form>
		</div>

	</div>
</div>
</div>

@stop