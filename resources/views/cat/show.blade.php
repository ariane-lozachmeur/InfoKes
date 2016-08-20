@extends('template')
@section('title') InfoKès @stop

@section('homeHead')
<div class="header-cat valign-wrapper" style="color:{{$cat->couleur_police}};background-color:{{$cat->couleur}};">
<h1 class="valign">{{$cat->name}}</h1>
</div>
@stop

@section('content')

<div class="row">
	@foreach($articles as $article)
	<div class="col s6 m4">
		<div class="card">
			<div class="card-image">
				<img src="{{url('/')}}/{{$article->image}}">
				<span class="card-title">{{$article->titre}}</span>
			</div>
			<div class="card-content dotdotdot home-card">
				<p class="justify">
        @unless($article->presentation=="")
          {{$article->presentation}}
        @else
          Il va falloir lire cet article pour en savoir plus !
        @endunless
        </p>
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
	<div class="actus">
      @foreach ($actuskes as $actu)
          <div class="card blue darken-3">
            <div class="card-content dotdotdot actusKes white-text">
              <span class="card-title">Actus {{$actu->poste}}</span>
              <p>{!!$actu->contenu!!}</p>
            </div>
            <div class="card-action">
              <a href="#" class="white-text savoir-plus" data-id="{{$actu->id}}">En savoir plus</a>
            </div>
          </div>
    @endforeach
    </div>

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
    <div class="center">
    @include('partials.pagination', ['paginator' => $articles])
  </div>
@stop
@section('footer')

<script>
	var categories = {!!json_encode($categories)!!};
</script>

@stop
