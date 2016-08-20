<ul id="rubriques" class="dropdown-content transparent"><br>
@foreach ($categories as $cat)
  <li class="white "><a class="blue-text text-darken-2" href="{{url('categorie')}}/{{$cat->id}}">{{$cat->name}}</a></li>
  <li class="divider"></li>
  @endforeach
</ul>

<ul id="admin" class="dropdown-content transparent"><br>
  <li class="white "><a class="blue-text text-darken-2" href="{{url('article')}}">Valider les articles</a></li>
  <li class="divider"></li>
    <li class="white "><a class="blue-text text-darken-2" href="{{url('khote')}}">Voir les khotes</a></li>
  <li class="divider"></li>
    <li class="white "><a class="blue-text text-darken-2" href="{{url('categorie')}}">Gérer les rubriques</a></li>
  <li class="divider"></li>
  <li class="white"><a class="blue-text text-darken-2" href="{{url('ik')}}">Poster l'IK</a></li>
</ul>

<div class="navbar-fixed">  
<nav class="{{$page==='home' ? 'transparent' : 'blue' }} darken-3" role="navigation" id="navbar">
  <div class="nav-wrapper nav-perso">
  <a id="logo-container" href="{{url('/')}}" class="brand-logo">InfoKès</a>
      <ul class="left hide-on-med-and-down" style="margin-left:120px">
        <li><a class="dropdown-button" href="#!" data-activates="rubriques">Rubriques</a></li>
        <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
        <li><a href="{{url('jeux')}}">Jeux</a></li>
        @if (isset($session['role']) && $session['role']==3)
        <li><a class="dropdown-button" href="#!" data-activates="admin">Administration</a></li>
        @endif
      </ul>
    <ul class="right hide-on-med-and-down"> 
      <li><a href="{{$ik->pdf}}" download>Télécharger l'IK</a></li>
      <li><a href="{{url('article/create')}}">Rédiger un article</a></li>
      <li><a href="{{url('khote/create')}}">Poster une khote</a></li>
      <li><a href="#"><i class="large material-icons modal-trigger" href="#modalLogin">play_for_work</i></a></li>

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
              </ul>
            </div>
        </li>
      </ul>
      <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
      <li><a href="{{url('jeux')}}">Jeux</a></li>
      <ul class="collapsible" data-collapsibe="accordion">
       <li><a class="collapsible-header">Administration</a>
            <div class="collapsible-body">
              <ul>
                <li class="white"><a href="{{url('article')}}">Valider les articles</a></li>
                <li class="white"><a href="{{url('khote')}}">Voir les khotes</a></li>
                <li class="white"><a href="{{url('categorie')}}">Gérer les rubriques</a></li>
                <li class="white"><a href="{{url('ik')}}">Poster l'IK</a></li>
              </ul>
            </div>
        </li>
      </ul>

      <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
      <li><a href="{{$ik->pdf}}" download>Télécharger l'IK</a></li>
      <li><a href="{{url('article/create')}}">Rédiger un article</a></li>
      <li><a href="{{url('khote/create')}}">Poster une khote</a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav>
</div>