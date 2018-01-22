<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eu Amo Corridas</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div id="next-race" class="modal">
        <div class="modal-content blue lighten-2">
          <h4 class="center">Próxima Corrida</h4>
          <blockquote class="center">
              Corrida de Fulano!
              <br>
              Praça da Matriz até Éden, venha!
          </blockquote>
        </div>
        
    </div>
    <div id="results" class="modal">
        <div class="modal-content blue lighten-2">
          <h4 class="center">Resultados</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        
    </div>
   
    <div class="navbar-fixed">
        <nav class="blue lighten-2">
            <ul class="show-on-large right">
                <li><a href="/">Home</a></li>
                <li><a href="/about">Quem Somos</a></li>
                <li><a href="#next-race" class="modal-trigger">Próximas Corridas</a></li>
                <li><a href="#results" class="modal-trigger">Resultados</a></li>
                <li><a href="#">Fotos</a></li>
                <li><a href="#">Tv Saúde</a></li>
                <li><a href="#">Notícias</a></li>
                <li><a href="#">Contato</a></li>
                <?php if (isset($user) && $user->cpf == "182.753.488-94"): ?>
                    <ul id='adm-drop' class='dropdown-content'>
                      <li><a href="/182.753.488-94/dashboard">Painel Administrativo</a></li>
                      <li><a href="#!">two</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">three</a></li>
                      
                    </ul>
                 <li><a href="#" class="dropdown-button" data-activates='adm-drop'>Administrador</a></li>
               
              <?php else: ?>
                <li><a href="/login">Minha Conta</a></li>
                 <?php endif ?>
            </ul>
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