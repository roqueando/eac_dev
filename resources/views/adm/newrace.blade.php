@extends('.layouts.dashboard')
@section('title', 'Nova Corrida')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<div class="card-title center">Nova Corrida</div>

			<div class="card-body">
				<form role="form" id="newrace-form">
					<div class="row">
						<div class="col">
							<label class="white-text">Nome da Corrida</label>
							<input type="text" id="race-name" placeholder="Nome da corrida">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
@stop