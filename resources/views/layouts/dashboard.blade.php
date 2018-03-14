<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eu Amo Corridas | Painel Administrativo</title>
    <link rel="stylesheet" href="<?php echo asset('css/materialize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
     
</head>
<body style="background-color: #74b9ff">

	<ul id="slide-out" class="side-nav fixed" style="background-color: #303952">
       <li><a href='/182.753.488-94/dashboard/' style="color: #fff">Página Inicial Dashboard</a></li>
      <li><a href="/182.753.488-94/dashboard/newpost" style="color: #fff">Criar Postagens</a></li>
      <li><a href="/182.753.488-94/dashboard/deletepost" style="color: #fff">Deletar Postagens</a></li>
      <li><a href="/182.753.488-94/dashboard/newrace" style="color: #fff">Postar Corridas</a></li>
      <li><a href="/182.753.488-94/dashboard/deleterace" style="color: #fff">Deletar Corridas</a></li>
      <li><a href="/182.753.488-94/dashboard/newalbum" style="color: #fff">Criar Galeria de Fotos</a></li>
      <li><a href="/182.753.488-94/dashboard/deletealbum" style="color: #fff">Deletar Album</a></li>
      <li><a href='/' style="color: #fff">Página inicial do site</a></li>
    </ul>
   
    <div style="position: absolute; left: 300px; width: 78.0%;" class="grad-bg">
        <div class="navbar-fixed">
            <nav style="background-color: #0984e3">
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