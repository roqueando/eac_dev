<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="images/icon.jpeg" style="border-radius: 50%">
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
  

    <!-- SIDE MENU FOR MOBILE-FIRST -->

      <ul id="slide-out" class="side-nav hide-on-large-only  blue lighten-2">

        @if($user && $user->cpf == "181.752.487-93")

            <ul class="collapsible center-align" data-collapsible="accordion">
              <li class="btn btn-large">
                <div class="collapsible-header center-align">Administrador</div>
                <div class="collapsible-body">
                  <a href="/182.753.488-94/dashboard">Painel Administrativo</a>
                  <a href="/logout" id="logout-btn">Sair</a>
                </div>
              </li>
              
            </ul>
               
        @else

          <li><a href="/login" class="btn btn-large center">Minha Conta</a></li>

        @endif
          <li><a href="/" class="btn btn-large">Home</a></li>
          <li><a href="/races" class="modal-trigger btn btn-large">Próximas Corridas</a></li>
          <!-- <li><a href="#results" class="modal-trigger btn btn-large">Resultados</a></li> -->
          <li><a href="/photos" class="btn btn-large">Fotos</a></li>
          <li><a href="#" class="btn btn-large">Contato</a></li>
             
          
      </ul>
    <!-- /SIDE-MENU -->
   
    <div class="navbar-fixed">
        <nav class="blue lighten-2">

          <a href="/" class="brand-logo">
            <img src="images/icon.jpeg" class="circle avatar" style="width: 60px; height: 60px; padding: 6px">
           
          </a>
          
          <!-- MENU WITHOUT MOBILE-FIRST -->
            <ul class="hide-on-small-only right">
              
                <li><a href="/">Home</a></li>
                <li><a href="/races" class="modal-trigger">Próximas Corridas</a></li>
                <!-- <li><a href="#results" class="modal-trigger">Resultados</a></li> -->
                <li><a href="/photos">Fotos</a></li>
                <li><a href="#">Contato</a></li>

                @if($user && $user->cpf == "181.752.487-93")
                    <ul id='adm-drop' class='dropdown-content'>
                      <li><a href="/182.753.488-94/dashboard">Painel Administrativo</a></li>
                      <li class="divider"></li>
                      <li><a href="/logout" id="logout-btn">Sair</a></li>
                      
                    </ul>
                    <li class="hide-on-small-only"><a href="#" class="dropdown-button right" data-activates='adm-drop'>Administrador <i class="material-icons right">arrow_drop_down</i> </a></li>
                @elseif($user)

                  <ul id='adm-drop' class='dropdown-content'>
                      <li><a href="/myraces">Minhas Corridas</a></li>
                      <li class="divider"></li>
                      <li><a href="/logout" id="logout-btn">Sair</a></li>
                      
                  </ul>
                  <li><a href="#" class="dropdown-button" data-activates='adm-drop'>Bem vindo, {{$user->name}} <i class="material-icons right">arrow_drop_down</i> </a></li
                @else
                  <li><a href="/login">Minha Conta</a></li>
                @endif
            </ul>
          <!-- /MENU -->

          <div class="hide-on-large-only hide-on-med-only">
            <a href="#" class="button-collapse" data-activates="slide-out"><i class="material-icons" style="font-size: 55px">menu</i></a>
            <a class="brand-logo center" style="font-size: 22px">Eu amo Corridas</a>
          </div>
        </nav>
    </div>
    <div >
      <div >
        
  <div class="slider blue lighten-4" >
    <ul class="slides" >

      <li>
        <img src="/images/racing1.jpg" class="responsive-img"> <!-- random image -->
        <div class="caption center-align" style="color: #333; background-color: #e0e0e0; padding: 16px; border-radius: 15px;">
          
            <h3>Bem-Vindos</h3>
          

          <h5 class="light">Sejam todos bem-vindos ao Eu Amo Corridas</h5>
        </div>
      </li>
      <li>
        <div class="slide-img-chang">
          <img src="/images/highlevel/high.png" > <!-- random image -->
        </div>
      </li>
      <li>
        <img src="/images/highlevel/aterro.png"> <!-- random image -->
      </li>
      <li>
        <img src="/images/highlevel/quinta.png"> <!-- random image -->
      </li>
      <li>
        <a href="/services">
        <div class="caption center-align" style="color: #333; background-color: #e0e0e0; padding: 16px; border-radius: 15px;">
          <h3>Serviços Para Você!</h3>
          <h5 class="light ">Aqui você encontra os serviços de nossos parceiros</h5>

          <img src="images/adv_coders.jpeg" style="width: 100px; height: 100px" class="circle avatar">
          <img src="images/icon.jpeg" style="width: 100px; height: 100px" class="circle avatar">
          <img src="images/racing1.jpg" style="width: 100px; height: 100px" class="circle avatar">
        </div>
        </a>
      </li>
      
    </ul>
  </div>
      
      </div>
        
    </div>
        
    <div >
        @yield('content')
    </div>


      <footer class="page-footer blue darken-4">
          <div class="container">
            <div class="row">
              
              <div class="col l6 s12">
                <img src="images/logo.png" class="responsive-img" width="100%" height="200">
                <p class="grey-text text-lighten-4">Amar e correr são uma ação. Se motive, vem com a gente!</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"><img src="images/fb.png" width="60" height="60"> </a></li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Eu Amo Corridas - Desenvolvido por Vítor Roque
            </div>
          </div>
        </footer>
              
    <script src="js/JQuery.js"></script>
    <script src="https://assets.pagar.me/pagarme-js/3.0/pagarme.min.js"></script>
    <script src="https://assets.pagar.me/checkout/1.1.0/checkout.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>