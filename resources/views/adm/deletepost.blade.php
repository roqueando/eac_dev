@extends('.layouts.dashboard')
@section('title', 'Nova Postagem')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<span class="card-title center">Deletar Postagem</span>
			<div class="card-body">
			
			<form role="form" id="deletepost-form"> 
				{{csrf_field()}}
				
				<div class="row">
					<div class="col s12">
						<select id="posts">
							@foreach($posts as $p)
								<option value="{{$p->id}}">{{$p->title}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row center">
					<div class="col s12">
						<button class="btn waves-effect btn-large red darken-3" type="submit">Deletar postagem</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop