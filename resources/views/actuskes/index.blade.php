@extends('template')
@section('title') InfoKès @stop


@section('content')

<div class="fixed-action-btn" style="bottom: 50px; right: 50px;">
    <a class="btn-floating btn-large blue" href="{{url('actuskes')}}/create">
      <i class="large material-icons">add</i>
    </a>
  </div>

<div class="row white bloc-padding">
<h2 class="inline"> Des nouvelles de la Kès</h2>
	@foreach($actuskes as $actu)
	<div class="divider"></div>
	<div class="section contenu">
		<h5 class="inline">{{$actu->titre}} - {{$actu->poste}}</h5>
		<a class="btn-floating btn waves-effect waves-light left btn-edit blue" href="{{url('actuskes')}}/{{$actu->id}}/edit"><i class="tiny material-icons">mode_edit</i></a>
    	<p>{{$actu->contenu}}</p>
    	 <p class="date">{{$actu->created_at}}</p>

	</div>
	@endforeach
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
