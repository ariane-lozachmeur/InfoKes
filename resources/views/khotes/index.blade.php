@foreach ($khotes as $khote)

{{$khote->auteur}} khote {{$khote->contenu}} <br>

@endforeach

<a href="{{url('/')}}">Retour à l'accueil</a>

