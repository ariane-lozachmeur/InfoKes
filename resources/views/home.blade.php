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

@include('partials.articles')

@stop

@section('side')
	@include('partials.side-actuskes')
@stop
@section('footer')

<script>
	var categories = {!!json_encode($categories)!!};
</script>

@stop
