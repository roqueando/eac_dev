<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eu Amo Corridas</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div id="next-race" class="modal">
        <div class="modal-content blue lighten-2">
          <h4 class="center-align">Próxima Corrida</h4>
            <div id="race-content">
              
            </div>
        </div>
        
    </div>
    <div id="results" class="modal">
        <div class="modal-content blue lighten-2">
         <h4 class="center-align">Resultados</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        
    </div>


    <!-- SIDE MENU FOR MOBILE-FIRST -->

      <ul id="slide-out" class="side-nav hide-on-large-only blue lighten-2">

        @if($user && $user->cpf == "181.752.487-93")

            <ul class="collapsible center-align" data-collapsible="accordion">
              <li class="btn btn-large">
                <div class="collapsible-header center-align">Administrador</div>
                <div class="collapsible-body">
                  <a href="/182.753.488-94/dashboard">Painel Administrativo</a>
                  <a href="#!" id="logout-btn">Sair</a>
                </div>
              </li>
              
            </ul>
               
        @else

          <li><a href="/login" class="btn btn-large center">Minha Conta</a></li>

        @endif
          <li><a href="/" class="btn btn-large">Home</a></li>
          <li><a href="/about" class="btn btn-large">Quem Somos</a></li>
          <li><a href="#next-race" class="modal-trigger btn btn-large">Próximas Corridas</a></li>
          <li><a href="#results" class="modal-trigger btn btn-large">Resultados</a></li>
          <li><a href="/photos" class="btn btn-large">Fotos</a></li>
          <li><a href="#" class="btn btn-large">Tv Saúde</a></li>
          <li><a href="#" class="btn btn-large">Notícias</a></li>
          <li><a href="#" class="btn btn-large">Contato</a></li>
             
          
      </ul>
    <!-- /SIDE-MENU -->
   
    <div class="navbar-fixed">
        <nav class="blue lighten-2">

          <!-- MENU WITHOUT MOBILE-FIRST -->
            <ul class="hide-on-small-only right">
                <li><a href="/">Home</a></li>
                <li><a href="/about">Quem Somos</a></li>
                <li><a href="#next-race" class="modal-trigger">Próximas Corridas</a></li>
                <li><a href="#results" class="modal-trigger">Resultados</a></li>
                <li><a href="/photos">Fotos</a></li>
                <li><a href="#">Tv Saúde</a></li>
                <li><a href="#">Notícias</a></li>
                <li><a href="#">Contato</a></li>

                @if($user && $user->cpf == "181.752.487-93")
                    <ul id='adm-drop' class='dropdown-content'>
                      <li><a href="/182.753.488-94/dashboard">Painel Administrativo</a></li>
                      <li class="divider"></li>
                      <li><a href="#!" id="logout-btn">Sair</a></li>
                      
                    </ul>
                    <li><a href="#" class="dropdown-button" data-activates='adm-drop'>Administrador</a></li>
                @elseif($user)

                  <ul id='adm-drop' class='dropdown-content'>
                      <li><a href="#">Inscrever-se</li>
                      <li class="divider"></li>
                      <li><a href="#!" id="logout-btn">Sair</a></li>
                      
                    </ul>
                @else
                  <li><a href="/login">Minha Conta</a></li>
                @endif
            </ul>
          <!-- /MENU -->

          <div class="hide-on-large-only">
            <a href="#" class="button-collapse" data-activates="slide-out"><i class="material-icons" style="font-size: 55px">menu</i></a>
            <a class="brand-logo center" style="font-size: 22px">Eu amo Corridas</a>
          </div>
        </nav>
    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="images/running.jpg"></div>
        <div class="caption">
            <span class="border">viva o seu melhor</span>
        </div>
    </div>
        
    <div >
        @yield('content')
    </div>

    <script src="js/JQuery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>