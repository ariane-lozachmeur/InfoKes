@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	@foreach($articles as $article)
	<div class="col s6 m4 l3">
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
				@endunless</p>
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
<script type="text/javascript">
		var categories = {!!json_encode($categories)!!};
</script>
@stop
