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
				<a class="waves-effect waves-light btn blue darken-4" href="{{$ik->pdf}}" download style="margin-top:30px;">Téléchager l'IK</a>
	<a class="waves-effect waves-light btn blue darken-4 connect" data-role="1">Connection X</a>
	<a class="waves-effect waves-light btn blue darken-4 connect" data-role="2">Connection kessier</a>
	<a class="waves-effect waves-light btn blue darken-4 connect" data-role="3">Connection IK</a>
@if(Session::has('role'))
{{Session::get('role')}}
@endif
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
				<img src="{{$article->image}}">
				<span class="card-title">{{$article->titre}}</span>
			</div>
			<div class="bandeau-rubrique" data-cat="{{$article->cat_id}}"></div>
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
