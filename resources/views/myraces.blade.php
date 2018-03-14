@extends('layouts.main')

@section('content')

	<div id="card-modal" class="modal">
	    <div class="modal-content">
			<h4>Pagar c/ Cartão de Cŕedito</h4>

			<form role="form" id="card-form">
					<div class="row">
					<div class="col s6">
						 Número do cartão: <input type="text" id="card_number"/>
					</div>
					<div class="col s6">
						 Nome (como escrito no cartão): <input type="text" id="card_holder_name"/>
					</div>
				</div>

				<div class="row">
					<div class="col s6">
						Mês de expiração: <input type="text" id="card_expiration_month"/>
					</div>
					<div class="col s6">
						Ano de expiração: <input type="text" id="card_expiration_year"/>
					</div>
				</div>
				
				<div class="row">
					Código de segurança: <input type="text" id="card_cvv"/>
				</div>

				<div class="row center-align">
					<button type="submit" class="btn blue">realizar pagamento</button>
				</div>
			</form>

	    </div>
	    
	</div>
        
	
	<div class="main blue lighten-4">
		<h1 class="center-align" style="padding: 16px; background-color: #e0e0e0; border-radius: 5px;">Minhas Corridas</h1>
				@if(empty($myraces[0]))
					<h6 class="center-align" style="padding: 16px; background-color: #e0e0e0; border-radius: 5px;">Não há corridas pŕe-inscritas</h6>
				@endif
		
				 @foreach($myraces as $r)
				 <div class="row">
				 	
				 		<div class="card" style="padding: 1em">
				 			<div class="card-content">
				 				<div class="card-title" >{{$r->race_name}}</div>
				 				
				 				Valor: <input type="text" id="value" value="{{$r->race_value}}" disabled> <br>
				 				Tamanho da blusa: {{$r->blouse_height}}

				 				@if($r->status == "waiting")
					 				<div class="right-align">
					 					<button class="btn red " onclick="cancel({{$r->subId}})">Cancelar</button>
					 					<button class="btn green " onclick="boleto_pay()">Pagar c/ Boleto</button>
					 					<button class="btn blue disabled" onclick="card_pay()" id="pay-button">Pagar c/ Cartão</button>
					 				</div>
					 			@elseif($r->status == "paid")
					 				<div class="right-align">
					 					<button class="btn green ">PAGO, inscrição concluída</button>
					 				</div>
					 			@elseif($r->status == "canceled")
					 				<div class="right-align">
					 					<button class="btn green " >CANCELADA, inscrição cancelada  </button>
					 				</div>
				 				@endif
				 			</div>
				 		</div>
				 	
				 </div>
				 @endforeach
	        
	</div>

@stop