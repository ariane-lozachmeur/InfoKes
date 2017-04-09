@extends('template')
@section('title') InfoKès @stop

@section('homeHead')
<div class="header-cat valign-wrapper" style="color:{{$cat->couleur_police}};background-color:{{$cat->couleur}};">
<h1 class="valign">{{$cat->name}}</h1>
</div>
@stop

@section('content')

@include('partials.articles')

@stop

@section('side')
	 @include('partials.side-actuskes')
@stop

@section('footer')

<script>
	var categories = {!!json_encode($categories)!!};
</script>

@stop
