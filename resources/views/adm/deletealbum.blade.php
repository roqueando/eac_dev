@extends('.layouts.dashboard')
@section('title', 'Deletar Galeria')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<span class="card-title center">Deletar Galeria</span>
			<div class="card-body">
			
			<form role="form" id="deletegallery-form"> 
				{{csrf_field()}}
				
				<div class="row">
					<div class="col s12">
						<select id="galeries">
							@foreach($galeries as $g)
								<option value="{{$g->id}}">{{$g->album_name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row center">
					<div class="col s12">
						<button class="btn waves-effect btn-large red darken-3" type="submit">Deletar galeria</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop