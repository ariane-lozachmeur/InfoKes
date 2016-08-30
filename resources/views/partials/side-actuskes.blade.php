<div class="actus">
      @foreach ($actuskes as $actu)
          <div class="card blue lighten-1">
            <div class="card-content dotdotdot actusKes white-text">
              <span class="card-title">Actus {{$actu->poste}}</span>
              <p>{!!$actu->contenu!!}</p>
            </div>
            <div class="card-action">
              <a href="{{url('actuskes')}}?actu={{$actu->id}}" data-id="{{$actu->id}}" class="white-text savoir-plus">En savoir plus</a>
            </div>
          </div>
    @endforeach
  </div>