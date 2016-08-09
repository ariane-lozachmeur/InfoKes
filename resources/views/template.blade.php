<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>@yield('title')</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{url('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  @yield('header')
</head>
<body>

  @include('partials.navbar')

  @yield('content')

  <footer class="page-footer blue lighten-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Rejoint l'équipe de l'IK !</h5>
          <p class="grey-text text-lighten-4">Si tu es un grand fan de ce journal ou que tu désire simplement montrer tes talents de journaliste, d'écrivan ou d'inforgraphiste à la promotion, rejoint l'équipe de l'IK ! Pour cela, rien de plus simple : envoie un mail à ik@eleves.polytechnique.edu et on se fera une joie de t'accueillir dans notre équipe.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Site réalisé par Ariane Lozac'hmeur
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{url('js/materialize.js')}}"></script>
  <script src="{{url('js/init.js')}}"></script>
  <script type="text/javascript">
    var session = {!!json_encode($session)!!}
  if (typeof(session.message) !== 'undefined') {
     Materialize.toast(session.message, 4000);
   }
    </script>
  @yield('footer')
</body>
</html>
