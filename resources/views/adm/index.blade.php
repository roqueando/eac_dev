@extends('.layouts.dashboard')

@section('content-board')
	
	<?php if($user): ?>
	<nav class="purple lighten-1">
		<a href="brand-logo">{{$user->name}}</a>
	</nav>
	<?php endif; ?>
	<div class="container">
		
	</div>
@stop