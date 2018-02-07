@extends('.layouts.dashboard')
@section('title', 'Nova Postagem')
@section('content-board')
	
	<div class="card grey darken-3">
		<div class="card-content white-text">
			<span class="card-title center">Nova Postagem</span>
			<div class="card-body">
			
			<form role="form" id="newpost-form"> 
				{{csrf_field()}}
				<div class="row">
					<div class="col s6">
						<label class="white-text">Título</label>
							<input type="text" id="post-title" placeholder="Insira o título da postagem" style="color: #fff">
					</div>
					<div class="col s6">
						<label class="white-text">Autor</label>
						<input type="text" id="post-author" placeholder="Insira o autor da postagem" style="color: #fff">
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<label class="white-text">Texto da postagem</label>
						<textarea class="materialize-textarea" id="post-text"></textarea>
					</div>
				</div>
				<div class="row" id="choose-field">
					<div class="col s4 center">
						<a class="btn btn-large" onclick="showImgField()">inserir imagem</a>
					</div>
					<div class="col s4 center">ou</div>
					<div class="col s4 center">
						<a class="btn btn-large" onclick="showVideoField()">inserir video</a>
					</div>
				</div>

				<div class="row center" style="display: none" id="img-line">
					<div class="col s8">
						<label>Inserir Imagens (caso não queira por imagens, não carregue nenhum arquivo)</label>
						   <div class="file-field input-field">
						      <div class="btn">
						        <span>Imagens</span>
						        <input type="file" id="post-img" enctype="multiform-data">
						      </div>
						      <div class="file-path-wrapper">
						        <input class="file-path validate" type="text">
						      </div>
						    </div>
					</div>
					<div class="col s4 center">
						<a class="btn btn-large" onclick="showVideoField()">inserir video</a>
					</div>
					
				</div>

				<div class="row center" id="video-line" style="display: none">
					<div class="col s8">
						<label>Inserir Videos </label>
						   <div class="file-field input-field">
						      <div class="btn">
						        <span>Videos</span>
						        <input type="file" id="post-video">
						      </div>
						      <div class="file-path-wrapper">
						        <input class="file-path validate" type="text">
						      </div>
						    </div>
					</div>
					<div class="col s4 center">
						<a class="btn btn-large" onclick="showImgField()">inserir imagem</a>
					</div>
				</div>

				<div class="row center">
					<div class="col s12">
						<button class="btn waves-effect btn-large green darken-3" type="submit">Criar postagem</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop