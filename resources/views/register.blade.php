@extends('layouts.login') @section('login')

<div id="terms" class="modal">
        <div class="modal-content blue lighten-2">
          <h4 class="center">Termos de Responsabilidade</h4>
          <blockquote class="center">
             <ul>
                 <li>Declaro estar ciente das regras de participação</li>
                 <li>Declaro estar bem de saúde para participar do evento</li>
             </ul>
          </blockquote>
        </div>
        
    </div>
<div class="caption-nopos">
    <span class="border">eu amo corridas</span>
</div>
<div class="container reg-box">
    <form role="form" id="form-register">
        <!-- first line -->
        {{csrf_field()}}
        <div class="row">
            <div class="col">
                <input type="text" id="name" placeholder="Nome">
            </div>
            <div class="col">
                <input type="text" id="age" placeholder="Idade">
            </div>
            <div class="col">
                <input type="text" id="rg" placeholder="RG">
            </div>
            <div class="col">
                <input type="text" id="cpf" placeholder="CPF: ex.: 000.000.000-00">
            </div>
            <div class="col">
                <input type="text" id="address" placeholder="Endereço">
            </div>
            <div class="col">
                <input type="text" id="cep" placeholder="CEP: ex.: 00000-000">
            </div>
        </div>
        <!-- second line -->
        <div class="row">
            <div class="col s6">
                <input type="text" id="phone" placeholder="Celular /ou Whatsapp">
            </div>
            <div class="col s6">
                <input type="text" id="fb" placeholder="Facebook">
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <input type="password" placeholder="Senha" id="password">
            </div>
            <div class="col s6">
                <select name="" id="civil_state">
                    <option>Estado Civil</option>
                    <option value="0">Solteiro</option>
                    <option value="1">Casado</option>
                    <option value="2">Divorciado</option>
                    <option value="3">Separado</option>
                </select>
            </div>
        </div>
        <div class="row" id="third-line">
            <h5 class="">Participa de algum grupo de corrida?</h5>
            <div class="col s6">
                <p>
                    <input name="group1" type="radio" id="yes" />
                    <label for="yes">Sim</label>
                </p>
            </div>
            <div class="col s3">
                <p>
                    <input name="group1" type="radio" id="no" />
                    <label for="no">Não</label>
                </p>
            </div>
            <div class="col s3">
                <p>
                    <input name="term" type="checkbox" id="term1" value="agree"/>
                    <label for="term1" style="font-size: 12px; padding-left: 22px" onclick="showTerms()">
                       
                                Termos de responsabilidade
                      
                    </label>
                </p>
            </div>
            <a href="/" style="margin-top: 8%">Voltar para página principal</a>

            <button type="submit" class="btn btn-large" style="margin-left: 25%; margin-top: 6%">Inscrever-se</button>
        </div>

        <div class="row" id="fourth-line" style="display: none;">
            <div class="col s6">
                <input type="text" name="" id="group_name" placeholder="Qual?">
            </div>
            <div class="col s6">
                <input type="text" placeholder="Possui Facebook? Se não, deixe em branco" id="group_fb">
            </div>
            <div class="col s3">
                    <p>
                        <input name="term" type="checkbox" id="term" value="agree"/>
                        <label for="term" style="font-size: 12px; padding-left: 22px" onclick="showTerms()">
                           
                                    Termos de responsabilidade
                          
                        </label>
                    </p>
                </div>
            <a href="/" >Voltar para página principal</a>
            <button type="submit" class="btn btn-large" style=" margin-top: 8%">Inscrever-se</button>
        </div>
    </form>
</div>

@stop