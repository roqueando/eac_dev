<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eu Amo Corridas | Painel Administrativo</title>
    <link rel="stylesheet" href="<?php echo asset('css/materialize.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/materialize.min.css') ?>">
</head>
<body>

	<ul id="slide-out" class="side-nav fixed blue lighten-1">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
   
    <div style="position: absolute; left: 300px; width: 78.0%;">
    	@yield('content-board')
    </div>
 

	<script src="<?php echo asset('js/JQuery.js') ?>"></script>
    <script src="<?php echo asset('js/materialize.min.js') ?>"></script>
    <script src="<?php echo asset('js/adm.js') ?>"></script>
</body>
</html>