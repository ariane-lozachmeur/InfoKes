@extends('template')
@section('title') InfoKès @stop


@section('content')

<?php if(isset($_GET['actu'])){ 
	$actu_id = $_GET['actu']; 
	} else {
	$actu_id = -1;
	} ?>

<div class="row white bloc-padding">
<div class="ik-header">
	<h2 class=""> Des nouvelles de la Kès</h2>
	@unless($session['role']==1)
    <a class="btn-floating btn-large btn-flat" href="{{url('actuskes')}}/create">
      <i class="material-icons black-text huge">add</i>
    </a>
 	@endunless
 </div>
	<br>
	<ul class="collapsible" data-collapsible="accordion">
		@foreach($actuskes as $actu)
	    <li>
		  	<div class="collapsible-header {{$actu_id==$actu->id ? 'active' : ''}}">
		  		{{$actu->poste}} - {{$actu->titre}}
		  		@unless($session['role']==1)
		  		<a class="btn-floating btn-flat" href="{{url('actuskes')}}/{{$actu->id}}/edit"><i class="material-icons black-text" style="margin-left:4px;margin-top:-3px">mode_edit</i></a>
		  		@endunless
		  	</div>
		    <div class="collapsible-body justify bloc-padding white">
		      	<div>
			      	<h5>{{$actu->titre}}</h5>
			      	{!!$actu->contenu!!}
			      	<p class="date">Le {{$actu->created_at}}</p>
		      	</div>
		    </div>
		</li>
		@endforeach
	</ul>
</div>

@stop

@section('footer')
	<script type="text/javascript">
	    moment.locale('fr');
		$('.date').each(function(){
			$(this).text( moment($(this).text()).format('ll') );
		})
	</script>
@stop