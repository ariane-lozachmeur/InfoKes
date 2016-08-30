<div class="row">
	@foreach($articles as $article)
	<div class="col s6 m4">
    <div class="card sticky-action home-card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="{{url('/')}}/{{$article->image}}">
          <span class="badge badge-like white"><i class="tiny material-icons thumb">thumb_up</i> {{$article->like}}</span>
        </div>
        <div class="card-content">
          <div class="bandeau-rubrique" data-cat="{{$article->cat_id}}"></div>
          <div class="card-title activator grey-text text-darken-4">
            <div class="dotdotdot title">{{$article->titre}}</div>
            <i class="material-icons right menu">more_vert</i>
          </div>
        </div>
        <div class="card-action">
        <a class="blue-text" href="{{url('article')}}/{{$article->id}}">Lire l'article</a>
      </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">{{$article->titre}}<i class="material-icons right">close</i></span>
          <p class="justify">
        @unless($article->presentation=="")
          {{$article->presentation}}
        @else
          Il va falloir lire cet article pour en savoir plus !
        @endunless
        </p>
        </div>
     </div>
	</div>
	@endforeach
  <div class="center">
    @include('partials.pagination', ['paginator' => $articles])
  </div>
</div>