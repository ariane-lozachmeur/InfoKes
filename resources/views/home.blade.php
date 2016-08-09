@extends('template')
@section('title') InfoKès @stop

@section('content')

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

<div class="container">
	<div class="section">
		<div class="row">
			<br>
			<br>
			<br>
			<div class="col s6 m4 ">
				<div class="card">
					<div class="card-image">
						<img src="img/sample.jpg">
						<span class="card-title">Suicide Squad</span>
					</div>
					<div class="card-content">
						<p>Suicide Squad est le film le plus attendu de l'été. Pourtant, sa sortie a été loin d'être admirée par la critique. Voyons pourquoi.</p>
					</div>
					<div class="card-action">
						<a class="blue-text" href="#">Lire l'article</a>
					</div>
				</div>
			</div>

			<div class="col s6 m4">
				<div class="card">
					<div class="card-image">
						<img src="img/sample2.jpg">
						<span class="card-title">Suicide Squad</span>
					</div>
					<div class="card-content">
						<p>Suicide Squad est le film le plus attendu de l'été. Pourtant, sa sortie a été loin d'être admirée par la critique. Voyons pourquoi.</p>
					</div>
					<div class="card-action">
						<a class="blue-text" href="#">Lire l'article</a>
					</div>
				</div>
			</div>

			<div class="col s6 m4">
				<div class="card">
					<div class="card-image">
						<img src="img/sample3.jpg">
						<span class="card-title">Suicide Squad</span>
					</div>
					<div class="card-content">
						<p>Suicide Squad est le film le plus attendu de l'été. Pourtant, sa sortie a été loin d'être admirée par la critique. Voyons pourquoi.</p>
					</div>
					<div class="card-action">
						<a class="blue-text" href="#">Lire l'article</a>
					</div>
				</div>
			</div>	

		</div>
	</div>
</div>



@stop
