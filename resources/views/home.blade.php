@extends('template')
@section('title') InfoKès @stop

@section('homeHead')
<div class="slider home-photo">
	<ul class="slides">
		<li>
			<img src="{{url('img/campus.jpg')}}"> <!-- random image -->
			<div class="caption center-align" style="margin-top:20px;">
				<h3>InfoKès</h3>
				<h5 class="light grey-text text-lighten-3" style="margin-top:64px;">Bienvenue sur le site du journal des élèves de l'École polytechnique.</h5>
				<a class="waves-effect waves-light btn blue darken-4" style="margin-top:30px;">Téléchager l'IK</a>

			</div>
		</li>
	</ul>
</div>
@stop

@section('content')

<div class="row">
	@foreach($articles as $article)
	<div class="col s6 m4">
		<div class="card">
			<div class="card-image">
				<img src="img/sample.jpg">
				<span class="card-title">{{$article->titre}}</span>
			</div>
			<div class="card-content dotdotdot home-card">
				<p>{{$article->presentation}}</p>
			</div>
			<div class="card-action">
				<a class="blue-text" href="{{url('article')}}/{{$article->id}}">Lire l'article</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
@stop

@section('side')
      @foreach ($actuskes as $actu)
          <div class="card blue darken-3">
            <div class="card-content dotdotdot white-text">
              <span class="card-title">Actus {{$actu->poste}}</span>
              <p>{{$actu->contenu}}</p>
            </div>
            <div class="card-action">
              <a href="#" class="white-text savoir-plus" data-id="{{$actu->id}}">En savoir plus</a>
            </div>
          </div>
    @endforeach

<!-- Modal for actuskes -->
<div id="modalActus" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="titre"></h4>
      <p class="contenu"></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Fermer</a>
    </div>
  </div>
@stop
@section('footer')

@stop
