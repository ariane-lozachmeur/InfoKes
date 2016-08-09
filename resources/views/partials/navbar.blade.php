<ul id="rubriques" class="dropdown-content transparent"><br>
  <li class="white "><a class="blue-text text-darken-2" href="#!">one</a></li>
  <li class="divider"></li>
  <li class="white"><a class="blue-text text-darken-2" href="#!">two</a></li>
  <li class="divider"></li>
  <li class="white"><a class="blue-text text-darken-2" href="#!">three</a></li>
  </ul>

<div class="navbar-fixed">  
<nav class="{{$page==='home' ? 'transparent' : 'blue' }} darken-3" role="navigation" id="navbar">
  <div class="nav-wrapper nav-perso">
  <a id="logo-container" href="{{url('/')}}" class="brand-logo">InfoKès</a>
      <ul class="left hide-on-med-and-down" style="margin-left:120px">
        <li><a class="dropdown-button" href="#!" data-activates="rubriques">Rubriques</a></li>
        <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
        <li><a href="{{url('jeux')}}">Jeux</a></li>
      </ul>
    <ul class="right hide-on-med-and-down"> 
      <li><a href="{{url('article/create')}}">Télécharger l'IK</a></li>
      <li><a href="{{url('article/create')}}">Rédiger un article</a></li>
      <li><a href="{{url('khote')}}">Poster une khote</a></li>
    </ul>

<!-- The nav bar for mobile devices -->
    <ul id="nav-mobile" class="side-nav">
      <ul class="collapsible" data-collapsibe="accordion">
       <li><a class="collapsible-header">Rubriques</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
        </li>
        </ul>
        <li><a href="{{url('actuskes')}}">Actus Kès</a></li>
        <li><a href="{{url('jeux')}}">Jeux</a></li>
      <li><a href="{{url('article/create')}}">Télécharger l'IK</a></li>
      <li><a href="{{url('article/create')}}">Rédiger un article</a></li>
      <li><a href="{{url('khote')}}">Poster une khote</a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav>
</div>