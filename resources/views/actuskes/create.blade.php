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
					    {!! $errors->first('postes', '<small class="error-message">:message</small>') !!}
					 </div>
					<div class="input-field col s12">
						<input name="titre" type="text" class="{!! $errors->has('titre') ? 'invalid' : '' !!}" value="{{old('titre')}}">
						<label for="titre">Titre</label>
						{!! $errors->first('titre', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<label for="contenu" class="active">Écrit ton message ici</label>
						<textarea id="textarea" name="contenu" class="materialize-textarea validate {!!$errors->has('contenu') ? 'invalid' : '' !!}">{{old('contenu')}}</textarea>
						{!! $errors->first('contenu', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_at" type="date" class="datepicker {!! $errors->has('published_at') ? 'invalid' : '' !!}" value="{{old('published_at')}}">
						<label for="published_at">Date de publication</label>
						{!! $errors->first('published_at', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12">
						<input id="date" name="published_until" type="date" class="datepicker {!! $errors->has('published_at') ? 'invalid' : '' !!}" value="{{old('published_until')}}">
						<label for="published_until">Publié jusqu'à </label>
						{!! $errors->first('published_until', '<small class="error-message">:message</small>') !!}
					</div>
					<div class="input-field col s12 center-align">
					<input type="submit" class="btn blue darken-3" value="Poster">
				</div>
			{{Form::close()}}
		</div>

	</div>

@stop