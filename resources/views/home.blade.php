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
				<a class="waves-effect waves-light btn blue darken-4" href="{{$latestik->pdf}}" download style="margin-top:30px;">Téléchager l'IK</a>
			</div>
		</li>
	</ul>
</div>

<h2 class="center-align home-titre"> Dans l'IK cette semaine </h2>

@stop

@section('content')

<div class="row">
	@foreach($articles as $article)
	<div class="col s6 m4">
		<div class="card sticky-action home-card">
		    <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="{{$article->image}}">
		      <span class="badge badge-like white"><i class="tiny material-icons thumb">thumb_up</i> {{$article->like}}</span>
		    </div>
		    <div class="card-content">
		    	<div class="bandeau-rubrique" data-cat="{{$article->cat_id}}"></div>
		    	<div class="card-title activator grey-text text-darken-4">
		    		<div class="dotdotdot title">{{$article->titre}}</div>
		    		<i class="material-icons right menu">more_vert</i>
		    	</div>
		    </div>
		    <div class="card-action">
				<a class="blue-text" href="{{url('article')}}/{{$article->id}}">Lire l'article</a>
			</div>
		    <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">{{$article->titre}}<i class="material-icons right">close</i></span>
		      <p class="justify">
				@unless($article->presentation=="")
					{{$article->presentation}}
				@else
					Il va falloir lire cet article pour en savoir plus !
				@endunless
				</p>
		    </div>
		 </div>
	</div>
	@endforeach

	<div class="center">
		@include('partials.pagination', ['paginator' => $articles])
	</div>
</div>
@stop

@section('side')
	<div class="actus">
      @foreach ($actuskes as $actu)
          <div class="card blue lighten-1">
            <div class="card-content dotdotdot actusKes white-text">
              <span class="card-title">Actus {{$actu->poste}}</span>
              <p>{!!$actu->contenu!!}</p>
            </div>
            <div class="card-action">
              <a href="{{url('actuskes')}}?actu={{$actu->id}}" data-id="{{$actu->id}}" class="white-text savoir-plus">En savoir plus</a>
            </div>
          </div>
    @endforeach
    </div>

@stop
@section('footer')

<script>
	var categories = {!!json_encode($categories)!!};
</script>

@stop
