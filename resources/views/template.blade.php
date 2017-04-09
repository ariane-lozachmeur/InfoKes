<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta name="_token" content="{!! csrf_token() !!}"/>

  <title>@yield('title')</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{url('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{url('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
   <link href="{{url('css/jquery.cleditor.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

  @yield('header')
</head>
<body>
  @include('partials.navbar')

  @yield('homeHead')

  <div class="container margin-top">
    <div class="row">
      @if($side==true)
      <div class="col s12 m9 l9">
        @yield('content')
      </div>
      <div class="col s12 m3 l3" id="aside">
        @yield('side')
      </div>
      @else
       <div class="col s12 m12">
        @yield('content')
      </div>
      @endif
    </div>
  </div>

  <!-- Modal for Login -->
<div id="modalLogin" class="modal">
  <div class="modal-content">
    <h4>Connexion</h4>
    <div class="row">
        <div class="col m6 center">
            <br /><br /><br />
            <a class="btn blue darken-3" href="{{url('frankizlogin')}}">Se connecter avec Frankiz</a>
        </div>
        <div class="col m6">
        <h5>Connexion admin</h5>
        {{Form::open(array('class'=>'col s12','url'=>'login'))}}
        <div class="row">
          <div class="input-field col s12">
            <input name="login" type="text" class="{!! $errors->has('login') ? 'invalid' : '' !!}" value="{{old('login')}}">
            <label for="titre">Login</label>
            {!! $errors->first('login', '<small class="error-message">:message</small>') !!}
          </div>
          <div class="input-field col s12">
            <input id="password" name="password" type="password" class="{!! $errors->has('published_at') ? 'invalid' : '' !!}">
            <label for="published_at">Password</label>
            {!! $errors->first('password', '<small class="error-message">:message</small>') !!}
          </div>
          <div class="input-field col s12 center-align">
            <input type="submit" class="btn blue darken-3" value="Se connecter">
          </div>
        </div>
          {{Form::close()}}
      </div>
    </div>
  </div>
</div>

  <footer class="page-footer blue lighten-2">
    <div class="container">
      <div class="row">
        <div class="col m6 s12">
          <h5 class="white-text">Rejoins l'équipe de l'IK !</h5>
          <p class="grey-text text-lighten-4">Si tu es un grand fan de ce journal ou que tu désire simplement montrer tes talents de journaliste, d'écrivan ou d'inforgraphiste à la promotion, rejoint l'équipe de l'IK ! Pour cela, rien de plus simple : envoie un mail à ik@eleves.polytechnique.edu et on se fera une joie de t'accueillir dans notre équipe.</p>
        </div>

        <div class="col m4 s12 offset-m1">
          <h5 class="white-text">Contacts</h5>
          <ul>
            <li class="white-text nowrap">Kessier IK (Luka) : ik@eleves.polytechnique.fr</li>
            <li class="white-text nowrap">Vice éditeur en chef : john.doe@gmail.fr</li>
            <li class="white-text nowrap">Graphiste : john.doe@gmail.fr</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Site réalisé par Ariane Lozac'hmeur avec l'aide du BR de l'École polytechnique.
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{url('js/materialize.js')}}"></script>
  <script src="{{url('js/jquery.dotdotdot.min.js')}}"></script>
  <script src="{{url('js/init.blade.js')}}"></script>
  <script src="{{url('js/moment-with-locales.min.js')}}"></script>
  <script src="{{url('js/readmore.min.js')}}"></script>
  <script src="{{url('js/jquery.cleditor.min.js')}}"></script>

  <script type="text/javascript">
    var session = {!!json_encode($session)!!}
  if (typeof(session.message) !== 'undefined') {
     Materialize.toast(session.message, 4000,'message_success');
  }

  if (typeof(session.message_error) !== 'undefined') {
     Materialize.toast(session.message_error, 4000,'message_error');
  }

    </script>
  @yield('footer')
</body>
</html>
