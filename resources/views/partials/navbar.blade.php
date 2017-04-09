<ul id="rubriques" class="dropdown-content transparent"><br>
@foreach ($categories as $cat)
  <li class="white"><a class="blue-text text-darken-2" href="{{url('categorie')}}/{{$cat->id}}">{{$cat->name}}</a></li>
  <li class="divider"></li>
  @endforeach
  <li class="white"><a class="blue-text text-darken-2" href="{{url('jeux')}}">Jeux</a></li>
</ul>

<ul id="admin" class="dropdown-content transparent"><br>
  <li class="white "><a class="blue-text text-darken-2" href="{{url('article')}}">Valider les articles</a></li>
  <li class="divider"></li>
  <li class="white"><a class="blue-text text-darken-2" href="{{url('article/fichier')}}">Récupérer les articles (fichiers)</a></li>
  <li class="divider"></li>

    <li class="white "><a class="blue-text text-darken-2" href="{{url('khote')}}">Voir les khotes</a></li>
  <li class="divider"></li>
    <li class="white "><a class="blue-text text-darken-2" href="{{url('categorie')}}">Gérer les rubriques</a></li>
  <li class="divider"></li>
  <li class="white"><a class="blue-text text-darken-2" href="{{url('ik/create')}}">Poster l'IK</a></li>
</ul>

<div class="navbar-fixed">  
<nav class="{{$page==='home' ? 'transparent' : 'blue' }} darken-3" role="navigation" id="navbar">
  <div class="nav-wrapper nav-perso">
  <a id="logo-container" href="{{url('/')}}" class="brand-logo">InfoKès</a>
  @if (isset($session['role']) && $session['role']>=1)
      <ul class="left hide-on-med-and-down" style="margin-left:120px">
        <li><a class="dropdown-button" data-hover="true" data-constrainwidth="false" data-activates="rubriques">Rubriques</a></li>
        <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
        <li><a href="{{url('ik')}}">Voir les IK</a></li>
        @if (isset($session['role']) && $session['role']==3)
        <li><a class="dropdown-button" data-hover="true" data-constrainwidth="false"   data-activates="admin">Administration</a></li>
        @endif
      </ul>
    <ul class="right hide-on-med-and-down"> 
    @if(isset($latestik))
      <li><a href="{{url('/')}}/{{$latestik->pdf}}" download>Télécharger l'IK</a></li>
    @endif
      <li><a href="{{url('article/create')}}">Rédiger un article</a></li>
      <li><a href="{{url('khote/create')}}">Poster une khote</a></li>
      @if(Session::get('user')==null)
      <li><a href="#"><i class="large material-icons modal-trigger" href="#modalLogin">open_in_browser</i></a></li>
      @else
      <li><a href="{{url('/')}}/logout"><i class="large material-icons">power_settings_new</i></a></li>
      @endif
    </ul>

<!-- The nav bar for mobile devices -->
    <ul id="nav-mobile" class="side-nav">
      <ul class="collapsible" data-collapsibe="accordion">
       <li><a class="collapsible-header">Rubriques</a>
            <div class="collapsible-body">
              <ul>
              @foreach ($categories as $cat)
                <li><a href="#!">{{$cat->name}}</a></li>
              @endforeach
                <li><a href="{{url('jeux')}}">Jeux</a></li>
              </ul>
            </div>
        </li>
      </ul>
      <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
      <li><a href="{{url('ik')}}">Voir les IK</a></li>
      <ul class="collapsible" data-collapsibe="accordion">
       <li><a class="collapsible-header">Administration</a>
            <div class="collapsible-body">
              <ul>
                <li class="white"><a href="{{url('article')}}">Valider les articles</a></li>
                <li class="white"><a href="{{url('article/fichier')}}">Récupérer les articles (fichiers)</a></li>
                <li class="white"><a href="{{url('khote')}}">Voir les khotes</a></li>
                <li class="white"><a href="{{url('categorie')}}">Gérer les rubriques</a></li>
                <li class="white"><a href="{{url('ik/create')}}">Poster l'IK</a></li>
              </ul>
            </div>
        </li>
      </ul>
      <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
      @if(isset($latestik))
      <li><a href="{{url('/')}}/{{$latestik->pdf}}"" download>Télécharger l'IK</a></li>
      @endif
      <li><a href="{{url('article/create')}}">Rédiger un article</a></li>
      <li><a href="{{url('khote/create')}}">Poster une khote</a></li>
      @if(Session::get('user')==null)
      <li><a href="#"><i class="large material-icons modal-trigger" href="#modalLogin">open_in_browser</i></a></li>
      @else
      <li><a href="{{url('/')}}/logout"><i class="large material-icons">power_settings_new</i></a></li>
      @endif
    </ul>
    @endif
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav>
</div>

