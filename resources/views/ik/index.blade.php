@extends('template')
@section('title') InfoKès @stop

@section('content')

<div class="row white bloc-padding">
<div class="ik-header">
<h3>Sommaire des IKs</h3>
@if( isset($session['role']) && $session['role']==3)
 <a class="btn-floating btn-flat btn-large waves-effect waves-light" href="ik/create"><i class="large material-icons black-text">add</i></a>
@endif
 </div>

	<?php $i =0; ?>
	@foreach ($iks as $ik)
	@if ($i%3==0)
	<div class="row">
	@endif
	<div class="col s12 m3 ik-wrapper">
		<a class="ik-lien" href="{{url('uploads/pdfs')}}/IK_{{$ik->numero}}.pdf" download>
			<img class="col s12 m12 l12 ik-une z-depth-2" src="{{$ik->une}}">
		</a>
		<div class="ik-titre">
			<p class="dotdotdot">{{$ik->titre}}</p>
			@if (isset($session['role']) && $session['role']==3)
			<a class="btn-floating btn-flat waves-effect waves-light" href="ik/{{$ik->numero}}/edit"><i class="large material-icons black-text">mode_edit</i></a>
			@endif
		</div>
	</div>
	@if ($i%3==2)
	</div>
	@endif
	<?php $i++; ?>
	@endforeach
	@unless ($i%3==0)
	</div>
	@endif
	<div class="center">
		@include('partials.pagination', ['paginator' => $iks])
	</div>

</div>

@stop

@section('footer')

@stop
