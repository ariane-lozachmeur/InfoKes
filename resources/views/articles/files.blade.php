@extends('template')
@section('title') InfoKès @stop


@section('content')

 <div class="row">
	@foreach($articles as $article)
	<div class="col s6 m4">
    <div class="row">
        <div class="col s12">
          <div class="card" id="{{$article->id}}">
            <div class="card-content">
              <span class="card-title">{{$article->titre}}</span>
            </div>
            <div class="card-action">
              <a class="blue-text" href="{{url('/')}}/{{$article->fichier}}"  download>Télécharger</a>
              <a onclick="deleteFile({{$article->id}})"><i class=" black-text small material-icons">delete</i></a>
            </div>
          </div>
          </div>
      </div>
	</div>
	@endforeach
  <div class="center">
    @include('partials.pagination', ['paginator' => $articles])
  </div>
</div>

 @if ($articles->isEmpty())
 <div class="center white bloc-padding" style="margin-top:-60px;">
 	<h3>Plus d'article à télécharger !</h3>
	<img src="{{url('/')}}/img/partytime.jpg">
</div>
@endif
@stop


@section('footer')
<script type="text/javascript">
		var categories = {!!json_encode($categories)!!};

function deleteFile(id){
  var id = id
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        method: 'POST',
        url: "fichier/"+id+"/delete",
        data: '',
        dataType:'json',
      })
        .done(function(data) {
          $("#"+id).hide()
          Materialize.toast("L\'article a bien été supprimé.", 5000,'green');

          ;
        })
        .fail(function(data){
          alert('Erreur');
        })
}

</script>
@stop
