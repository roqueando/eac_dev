@extends('.layouts.dashboard')
@section('title', 'Nova Galeria')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<div class="card-title center">Nova Galeria de Fotos</div>

			<div class="card-body">

				<form role="form" id="newalbum-form">
					<div class="container">
						{{csrf_field()}}
					<label class="white-text center">Nome da Galeria</label>
					<input type="text" id="album-name" placeholder="Insira o nome da Galeria">
					<button class="btn btn-large green darken-3" type="submit" style="margin-left: 250px">Criar Galeria</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="card grey darken-3">
		<div class="card-content white-text">
			<div class="card-title center">Adicionar fotos</div>

			<div class="card-body">

				<form role="form" id="add-form">
					{{csrf_field()}}
					<div class="row">
						<div class="col s6">
							<select id="album-id">

								<option value="" disabled selected>Escolha a galeria que deseja adicionar as fotos</option>							
								@foreach($albums as $a)
									<option value="{{$a->id}}">{{$a->album_name}}</option>

								@endforeach
							</select>
						</div>

						<div class="col s6">
							<div class="file-field input-field">
							      <div class="btn">
							        <span>foto</span>
							        <input type="file" id="album-img" enctype="multiform-data">
							      </div>
							      <div class="file-path-wrapper">
							        <input class="file-path validate" type="text">
							      </div>
							</div>
						</div>
					</div>
					<div class="row center">
						<button class="btn btn-large green darken-3" type="submit">Adicionar Foto</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop