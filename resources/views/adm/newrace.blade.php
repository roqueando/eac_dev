@extends('.layouts.dashboard')
@section('title', 'Nova Corrida')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<div class="card-title center">Nova Corrida</div>

			<div class="card-body">
				

				<form role="form" id="newrace-form">
					{{csrf_field()}}
					<div class="row">
						<div class="col s5">
							<label >Nome da Corrida</label>
							<input type="text" id="race-name" placeholder="Nome da corrida">
						</div>
						<div class="col s3">
							<label>Tipo da Corrida</label>
							<select id="typeRace" >
								<option>Escolha o tipo de corrida</option>
								<option value="0" >Corrida</option>
								<option value="1" >Caminhada</option>
							</select>
						</div>
						<div class="col s4">
							<div style="border-bottom: 13px solid transparent"></div>
							<button type="button" class="btn btn-large blue accent-4" onclick="addTraject()"><i class="material-icons left">add_circle_outline</i> adicionar trajetos</button>
						</div>
					</div>

					<div class="row">
						<div class="col" id="traject-row" style="width: 300px; height: 400px;overflow-y: scroll; border: 1px solid #e3e3e3; border-radius: 3px; padding: 0.75em"></div>
						<div class="col s4">
							<label>Localização do Evento</label>
							<input type="text" id="race_local">
						</div>
						<div class="col s3">
							<label>Data do Evento</label>
							<input type="text"  id="race_date">
						</div>
						<div class="row">
							<div class="col s4">
								<label>Hora do Evento</label>
								<input type="text" id="race_hour">
							</div>
							<div class="col s3">
								<label>Data da entrega do kit do Atleta</label>
								<input type="text" id="race_date_kit">
							</div>
							<div class="col s7">
								<label>Valor da Inscrição para a Corrida</label>
								<input type="text"  id="race_value">
							</div>
							<div class="col s7">
								<label>Descrição a mais</label>
								<textarea class="materialize-textarea" id="race_description" placeholder="Descreva algo sobre a corrida como o que é e não é permitido"></textarea>
							</div>
							
						</div>
						
					</div>

						<div class="row center">
							<button type="submit" class="btn btn-large green accent-4">Criar corrida</button>
							
						</div>
				</form>
			</div>

		</div>
				
				
	</div>

	
@stop