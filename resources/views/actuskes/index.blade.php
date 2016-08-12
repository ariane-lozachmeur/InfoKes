@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="row">
	@foreach($actuskes as $actu)
	<div class="col s6 m4">
		<div class="card">
			<div class="card-image">
				<img src="img/sample.jpg">
				<span class="card-title">{{$actu->titre}}</span>
			</div>
			<div class="card-content home-card">
				<p>{{$actu->contenu}}</p>
			</div>
		</div>
	</div>
	@endforeach
</div>
@stop

@section('footer')

@stop
