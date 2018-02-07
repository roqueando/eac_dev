<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eu Amo Corridas | Painel Administrativo</title>
    <link rel="stylesheet" href="<?php echo asset('css/materialize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>">
     
</head>
<body>

	<ul id="slide-out" class="side-nav fixed gradientness" >
       <li><a href='/182.753.488-94/dashboard/'>Página Inicial Dashboard</a></li>
      <li><a href="/182.753.488-94/dashboard/newpost">Criar Postagens</a></li>
      <li><a href="/182.753.488-94/dashboard/newrace">Postar Corridas</a></li>
      <li><a href="/182.753.488-94/dashboard/newalbum">Criar Galeria de Fotos</a></li>
      <li><a href='/'>Página inicial do site</a></li>
    </ul>
   
    <div style="position: absolute; left: 300px; width: 78.0%;" class="grad-bg">
        <div class="navbar-fixed">
            <nav class="purple lighten-1">
                <a href="#" class="brand-logo ">Dashboard > @yield('title')</a>
            </nav>
        </div>
    	@yield('content-board')
    </div>
 

	<script src="<?php echo asset('js/JQuery.js') ?>"></script>
    <script src="<?php echo asset('js/materialize.min.js') ?>"></script>
      <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        </script>
    <script src="<?php echo asset('js/adm.js') ?>"></script>

</body>
</html>