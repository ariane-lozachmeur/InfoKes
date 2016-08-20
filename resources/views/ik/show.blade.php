@extends('template')
@section('title') InfoKès @stop

@section('content')

<div class="row white bloc-padding center">
	<div class="ik-header">
		<h3>{{$thisik->titre}}</h3>
		@if (isset($session['role']) && $session['role']==3)
		<a class="btn-floating btn-flat btn-large waves-effect waves-light" href="ik/{{$thisik->numero}}/edit"><i class="large material-icons black-text">mode_edit</i></a>
		@endif
	</div>
	<div class="row">
		<div class="col s12 m4 offset-m4">
			<a class="ik-lien" href="{{url('uploads/pdfs')}}/IK_{{$thisik->numero}}.pdf" download>
				<img class="col s12 m12 l12 ik-une z-depth-2" src="{{url('/')}}/{{$thisik->une}}">
			</a>
		</div>
	</div>
	<div class="row center">
	    <a href="{{ url('ik') }}" class="waves-effect waves-light btn blue">Retour au sommaire</a>
	</div>

@stop

@section('footer')

@stop
