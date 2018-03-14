@extends('layouts.main')

@section('content')
	<div id="album-modal" class="modal" >
	    <div class="modal-content" >
	      <h4 id="album-title">Modal Header</h4>
	      <div id="album-content" class="row">
	      	
	      </div>
	    </div>
	    <div class="modal-footer">
	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
	    </div>
	 </div>


	<div class="main blue lighten-4">
		<h1 class="center-align" style="padding: 16px; background-color: #e0e0e0; border-radius: 5px;">Galerias </h1>
		
		
			
		
				 @foreach($albums as $a)
				 <div class="row">
				 	<div class="col s4">
				 		<div class="card" style="padding: 1em">
				 			<div class="card-content">
				 				<div class="card-title" >{{$a->album_name}}</div>
				 				
				 				<button class="right btn-floating btn-large waves-effect"  onclick="loadImages(this)" data-id="{{$a->id}}" data-name="{{$a->album_name}}" style="position: absolute; right: 20px; top: 30px"><i class="material-icons">open_in_new</i></button>
				 			</div>
				 		</div>
				 	</div>
				 		
				 	
				 </div>
				 @endforeach
	        
			
		
	</div>

@endsection