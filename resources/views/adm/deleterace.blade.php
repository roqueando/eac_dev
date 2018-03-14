@extends('.layouts.dashboard')
@section('title', 'Deletar Corrida')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<div class="card-title center">Deletar Corrida</div>

			<div class="card-body">
				

				<form role="form" id="deleterace-form">
					{{csrf_field()}}
					
						<div class="row">
							<div class="col s12">
									
								<select id="races">
										
									@foreach($races as $r)

										<option value="{{$r->id}}">{{$r->race_name}}</option>

									@endforeach

								</select>

							</div>
						</div>
						<div class="row center">
							<button type="submit" class="btn btn-large green accent-4">Deletar corrida</button>
							
						</div>
				</form>
			</div>

		</div>
				
				
	</div>

	
@stop