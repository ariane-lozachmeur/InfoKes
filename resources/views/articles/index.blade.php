@extends('template')
@section('title') InfoKès @stop


@section('content')

  @include('partials.articles')

 @if ($articles->isEmpty())
 <div class="center white bloc-padding" style="margin-top:-60px;">
 	<h3>Plus d'article à relire !</h3>
	<img src="{{url('/')}}/img/partytime.jpg">
</div>
@endif
@stop


@section('footer')
<script type="text/javascript">
		var categories = {!!json_encode($categories)!!};
</script>
@stop
