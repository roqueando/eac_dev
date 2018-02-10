@extends('.layouts.dashboard')
@section('title', 'Nova Corrida')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<div class="card-title center">Nova Corrida</div>

			<div class="card-body">
				<!-- <button class="btn btn-large waves-effect blue accent-4" onclick="addTraject()"><i class="material-icons left">add_circle_outline</i>Adicionar Trajeto</button> -->
						</div>

				<form role="form" id="newrace-form">
					{{csrf_field()}}
					<div class="row">
						<div class="col s6">
							<label >Nome da Corrida</label>
							<input type="text" id="race-name" placeholder="Nome da corrida">
						</div>
						<div class="col s6">
							<label>Tipo da Corrida</label>
							<select id="typeRace" onchange="turn(this.value)">
								<option>Escolha o tipo de corrida</option>
								<option value="0" >Corrida</option>
								<option value="1" >Caminhada</option>
							</select>
						</div>
						
					</div>
					
					<div id="racing" style="display: none">
						<div class="row center">
							<div class="col s12">
								<label style="font-size:45px">Trajetos de Corrida</label>
							</div>
														
						</div>
						
						<div class="row" id="traject-row">
							
							<div class="col s12">
								<input type="number" min="1" id="trj-1">
							</div>
		
							
						</div>
						<div class="row" id="traject-row">
							
							<div class="col s12">
								<input type="number" min="1" id="trj-2">
							</div>
							
						</div>

					</div>
					<div id="walking" style="display: none">
						<div class="row center">
							<div class="col s12">
								<label style="font-size:45px">Trajetos de Caminhada</label>
							</div>
														
						</div>
						
						<div class="row" id="traject-row">
							
							<div class="col s2">
								<input type="number" min="" name="trj-number">
							</div>
							<div class="col s9">
								<input type="text" name="trj-traject">
							</div>
							<div class="col s1">
								<button class="btn-floating green accent-4"><i class="material-icons">add</i></button>
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