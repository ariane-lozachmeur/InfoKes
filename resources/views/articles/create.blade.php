@extends('template')

@section('title') Rédiger un article @stop

@section('content')


		<div class="row white form-container">
		{{Form::open(array('class'=>'col s12','url'=>'article'))}}
				<div class="row">
					<div class="input-field col s12">
						<input name="titre" type="text" class="validate">
						<label for="titre">Titre</label>
					</div>
					<div class="input-field col s12">
						<input name="auteur" type="text" class="validate">
						<label for="auteur">Auteur(s)</label>
					</div>
					 <div class="input-field col s12">
					    <select name="cat_id">
					      <option value="" disabled selected>Choisi la rubrique dans laquelle ton veux publier ton article</option>
					      @foreach($categories as $cat)
					      <option class="blue-text darken-3" value="{{$cat->id}}">{{$cat->name}}</option>
					      @endforeach
					    </select>
					    <label>Rubrique</label>
					 </div>
					<div class="input-field col s12">
						<textarea name="presentation" class="materialize-textarea validate"></textarea>
						<label for="presentation">Présentation de l'article</label>
					</div>
					<div class="input-field col s12">
						<textarea name="contenu" class="materialize-textarea validate"></textarea>
						<label for="contenu">Écrit ton article ici</label>
					</div>
					<p>Ou poste un fichier Word ou OpenOffice (mais ton article ne sera pas immédiatement sur le site).</p>
					<div class="file-field input-field">
						<div class="btn blue darken-3">
							<span>Article</span>
							<input type="file" name="fichier">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Tu peux uploader un fichier Word ou Open Office">
						</div>
					</div>
					<div class="file-field input-field">
						<div class="btn blue darken-3">
							<span>Photos</span>
							<input type="file" name="image">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload une ou plusiers photos pour illuster ton article" multiple>
						</div>
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_at" type="date" class="datepicker">
						<label for="published_at">Date de publication</label>
					</div>
					<div class="input-field col s12 center-align">
					<input type="submit" class="btn blue darken-3" value="Publier">
				</div>
			{{Form::close()}}
		</div>

	</div>

@stop