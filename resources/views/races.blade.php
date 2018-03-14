@extends('layouts.main')
@section('content')
	<div id="subscribe-modal" class="modal blue lighten-2" style="height: 500px">
        <div class="modal-content blue lighten-2" >
          <h4 class="center-align">Inscrição à Corrida</h4>
            <form role="form" id="subscribe-form">
                <input type="hidden" id="race_id">
                <div class="row center-align " >
                    <div class="col s12">
                        <select id="blouse">
                            <option value="" disabled selected>Escolha o Tamanho da blusa</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="GG">GG</option>
                        </select>

                    </div>

                </div>
                <div class="row">
                     <div class="col s6">
                        <label style="color: #333">Horário</label>
                        <input type="text" id="hour" disabled >
                    </div>

                    <div class="col s6">
                        <label style="color: #333">No caso de incidentes, entrar em contato com:</label>
                        <input type="text" id="contact-number-for-incidents">
                    </div>
                </div>
                <div class="row">
                    <div class="col s6" >
                        <label style="color: #333">Valor da Corrida</label>
                        <input type="text" id="race_value" disabled >
                    </div>
                    <div class="col s6">
                        <label style="color: #333">Escolha o trajeto</label>
                        <select id="traject-choose">
                            <option></option>
                        </select>
                    </div>
                </div>
                 <div class="row">
                    <div class="col s6" >
                        <label style="color: #333">Localização</label>
                        <input type="text" id="local" disabled >
                    </div>
                    <div class="col s6">
                        <label style="color: #333">Descrição</label>
                       <input type="text" id="desc" disabled>
                    </div>
                </div>
                <div class="row center-align">
                    <button type="submit" class="btn btn-large blue accent-4">Inscrever-se nesta corrida</button>
                </div>
                
            </form>
        </div>
        
    </div>
	<div class="main blue lighten-4">
		<h1 class="center-align" style="padding: 16px; background-color: #e0e0e0; border-radius: 5px;">Próximas corridas </h1>

        <div class="row" id="races-content">
            
    		<ul class="collapsible blue lighten-4" data-collapsible="expandable" id="races-collapse" style="border: none; ">

    			
      		</ul>
        </div>
	</div>



@stop
