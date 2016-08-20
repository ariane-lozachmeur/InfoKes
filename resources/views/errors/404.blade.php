<?php $data = App\Http\Controllers\PagesController::dataCommune('404',false);
		$page=$data['page'];
		$session =  $data['session'];
		$categories = $data['categories'];
        $ik = $data['ik'];
        $side = $data['side']; 
?>

@extends('template')

@section('title') InfoKès - 404 @stop

@section('content')

<div class="row white bloc-padding center">
	<img src="https://emiliemalburny.files.wordpress.com/2016/04/mais-t-es-pas-la-mais-t-es-ou_design.png">
	<h5>Désolé, ce contenu n'a pas encore été crée.</h5>
</div>

@stop

@section('footer')

@stop