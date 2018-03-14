@extends('.layouts.dashboard')
@section('title', 'Home')
@section('content-board')
	
	
	<div class="container">
		<h1>Bem-Vindo Administrador</h1>
	</div>
		<div class="row " style="padding-left: 150px">
			<a href="/182.753.488-94/dashboard/newpost" class="col s3 card hovered" style="text-align: justify; background-color: #778beb; height: 150px; margin-right: 30px; border-radius: 5px; cursor: pointer;">
				<div class="center-align">
					<i class="material-icons center" style="font-size: 25px; padding-top: 20px">mode_edit</i>
					<h4>Criar Postagens</h4>
				</div>
			</a>

			<a href="/182.753.488-94/dashboard/newrace" class="col s3 card hovered" style="text-align: justify; background-color: #778beb; height: 150px;margin-right: 30px; border-radius: 5px; cursor: pointer;">
				<div class="center-align">
					<i class="material-icons center" style="font-size: 25px; padding-top: 20px">directions_run</i>
					<h4>Criar nova Corrida</h4>
				</div>
			</a>

			<a href="/182.753.488-94/dashboard/newalbum" class="col s3 card hovered" style="text-align: justify; background-color: #778beb; height: 150px; padding-left: 10px; border-radius: 5px; cursor: pointer;">
				<div class="center-align">
					<i class="material-icons center" style="font-size: 25px; padding-top: 20px">monochrome_photos</i>
					<h4>Criar galeria de Fotos</h4>
				</div>
			</a>
		</div>
		<div class="row " style="padding-left: 150px">
			<a href="/182.753.488-94/dashboard/deletepost" class="col s3 card hovered" style="text-align: justify; background-color: #778beb; height: 150px; margin-right: 30px; border-radius: 5px; cursor: pointer;">
				<div class="center-align">
					<i class="material-icons center" style="font-size: 25px; padding-top: 20px">cancel</i>
					<h4>Deletar Postagens</h4>
				</div>
			</a>

			<a href="/182.753.488-94/dashboard/deleterace" class="col s3 card hovered" style="text-align: justify; background-color: #778beb; height: 150px;margin-right: 30px; border-radius: 5px; cursor: pointer;">
				<div class="center-align">
					<i class="material-icons center" style="font-size: 25px; padding-top: 20px">close</i>
					<h4>Deletar Corrida</h4>
				</div>
			</a>

			<a href="/182.753.488-94/dashboard/deletealbum" class="col s3 card hovered" style="text-align: justify; background-color: #778beb; height: 150px; padding-left: 10px; border-radius: 5px; cursor: pointer;">
				<div class="center-align">
					<i class="material-icons center" style="font-size: 25px; padding-top: 20px">delete</i>
					<h4>Deletar Album</h4>
				</div>
			</a>
		</div>

		<div class="row">
			<div class="col l12">
				<footer style="position: absolute; bottom: -100px; right: 5px">
					<h6><i>Desenvolvido por Vítor Roque &copy; 2018</i></h6>
				</footer>
			</div>
		</div>
@stop