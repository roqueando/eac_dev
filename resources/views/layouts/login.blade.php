<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Eu Amo Corridas </title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
   <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        </script>
</head>
<body class="bg-login">
    <div >
        @yield('login')
    </div>

    <script src="js/JQuery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>