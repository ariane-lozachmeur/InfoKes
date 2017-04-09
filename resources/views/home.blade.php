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
				@if (isset($session['role']) && $session['role']>=1)
				<a class="waves-effect waves-light btn blue darken-4" href="{{$latestik->pdf}}" download style="margin-top:30px;">Télécharger l'IK</a>
				@else 
				<a class="waves-effect waves-light btn blue darken-4 modal-trigger" href="#modalLogin" style="margin-top:30px;">Se connecter</a>
				@endif
			</div>
		</li>
	</ul>
</div>

@if (isset($session['role']) && $session['role']>=1)
<h2 class="center-align home-titre"> Dans l'IK cette semaine </h2>
@else
<div class="container">
<div class="s8 offset-s2 z-depth-1" style="background-color: white; padding:20px;margin-top:40px">
<h5 style="text-align:center"> Ce site est destiné aux élèves de l'École polytechnique. Connecte-toi via Frankiz ou utilise le réseau interne de l'X.</h5>
</div>
</div>
@endif

@stop

@section('content')

@if (isset($session['role']) && $session['role']>=1)
@include('partials.articles')
@endif

@stop

@section('side')
@if (isset($session['role']) && $session['role']>=1)
	@include('partials.side-actuskes')
@endif
@stop
@section('footer')

<script>
	var categories = {!!json_encode($categories)!!};
</script>

@stop
