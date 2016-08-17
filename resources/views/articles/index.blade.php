@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	@foreach($articles as $article)
	<div class="col s6 m4 l3">
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


@section('footer')

@stop
