@extends('layouts.login') @section('login')

<div class="container">
    <div class="caption-nopos">
        <span class="border">eu amo corridas</span>
    </div>
    <div class="login-box">


        <form role="form" id="form-login">

            {{csrf_field()}}
            <label style="color: #fff; text-align: center;">CPF</label>
            <input type="text" id="cpf" placeholder="ex.: 000.000.000-00 (com os pontos e traços)">
            <br>

            <label style="color: #fff">Senha</label>
            <input type="password" id="password" placeholder="Digite sua senha">

            <br>
            <button type="submit" class="btn btn-large blue lighten-2 " style="margin-left: 35%">entrar</button>
            <br>
            <br>
            <div class="center">
                <a href="/register" class="center">Não se inscreveu? Acesse aqui.</a>
                <br>
                <a href="/" class="center">Voltar para página principal.</a>
            </div>

    </div>
</div>


@stop