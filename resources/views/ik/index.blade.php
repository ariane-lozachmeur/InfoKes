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

<div class="row">
 <div class="col m6 push-m3">
 	<p> Si tu recherche un IK en particulier, saisis sa date de publication (l'IK est publié le mercredi). </p>
  	<input type="date" name="date" id="date" class="datepicker">
 </div>
 </div>

	<div class="center">
		@include('partials.pagination', ['paginator' => $iks])
	</div>

</div>

@stop

@section('footer')
<script type="text/javascript">
$('#date').pickadate({
  monthsFull: [ 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre' ],
  monthsShort: [ 'jan', 'fév', 'mar', 'avr', 'mai', 'jun', 'jul', 'août', 'sep', 'oct', 'nov', 'dec' ],
  weekdaysFull: [ 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche' ],
  weekdaysShort: [ 'lu', 'ma', 'mer', 'jeu', 'ven', 'sa', 'di' ],
  today: 'Aujourd\'hui',
  clear: '',
  close: 'Valider',
  format: 'yyyy-mm-dd',
  firstDay: 2,
  closeOnSelect: true,
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 10, // Creates a dropdown of 15 years to control year
  max: new Date(),
  onSet: function(context){
  	var date=$('#date').val();
  	if(typeof(context.select)!=='undefined'){ //si on a bien selectionné une date
	  	$.ajax({
	    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
	    method: 'POST',
	    url: 'ik/date',
	    data: {date:date},
	    dataType:"json", 
	  })
	    .done(function(data) {
	    	//console.log(data);
	    	if (typeof(data.numero) !== 'undefined'){ //si la date correspond bien a un IK
	    		window.location="ik/"+data.numero;
	    	} else{
	  			Materialize.toast('Pas d\'IK publié ce jour là', 2000,'message_error');
	    	}
	    })
	    .fail(function(data){
	      //alert('fail');
	      console.log(data);
	    })
	}
  },
});
</script>
@stop
