
// There will be run when the document is ready
// Running modals, parallax, selects, dropdowns
// and the posts, loaded by an AJAX request.

$(document).ready(function() {
	var modals = {
		results: $("#results").modal(),
		next_race: $("#next-race").modal(),
		terms: $("#terms").modal()
		
	}
    $('.parallax').parallax();
	modals.results;
	modals.next_race;    
	modals.terms;
	$('select').material_select();
	$('.dropdown-button').dropdown();
	$('.collapsible').collapsible();
	$('.materialboxed').materialbox();
	$('.button-collapse').sideNav();


	$.ajax({
		url: '/getposts',
		type: 'GET',
		dataType: 'json',
		beforeSend: () => {
			var loader = `
			<div class="center">
			 <div class="preloader-wrapper big active">
			    <div class="spinner-layer spinner-green-only">
			      <div class="circle-clipper left">
			        <div class="circle"></div>
			      </div><div class="gap-patch">
			        <div class="circle"></div>
			      </div><div class="circle-clipper right">
			        <div class="circle"></div>
			      </div>
			    </div>
			  </div>
			</div>
			`;
			$(".post").html(loader);
		},
		success: (res) => {
			if(res.posts.length > 0) {

				for(var i in res.posts) {
					
					if(res.posts[i].image) {
						$('.post').append(`
						<div class="card grey lighten-2 post-item" style="padding: 1em">
				    		
				    		
				    		<div class="post-field">
				    			<h3>${res.posts[i].title}</h3>
				    			<div class="post-owner">
				    			<strong>${res.posts[i].author}</strong>
				    			</div>

				    			<img src="images/post_imgs/${res.posts[i].image}" style="width: 100%; height: 350px" >
				    			<blockquote>
				    				${res.posts[i].post_message}
				    			</blockquote>
				    		</div>
						</div>
						`);
					} else if(res.posts[i].video) {
						$('.post').append(`
						<div class="card grey lighten-2 post-item" style="padding: 1em">
				    		
				    		
				    		<div class="post-field">
				    			<h5 class="center">${res.posts[i].author}</h5>
				    			<div class="post-owner">

				    				<strong>//${res.posts[i].title}</strong>
				    			</div>
				    			<blockquote>
				    				${res.posts[i].post_message}
				    			</blockquote>

				    			<video width="100%" height="500" controls class="responsive-video">
								  <source src="images/videos/${res.posts[i].video}" type="video/mp4" >
								</video>
				    			
				    		</div>
						</div>
						`);
					} else {
						$('.post').append(`
						<div class="card grey lighten-2 post-item" style="padding: 1em">
				    		
				    		
				    		<div class="post-field">
				    			<h3>${res.posts[i].title}</h3>
				    			<div class="post-owner">
				    			<strong>${res.posts[i].author}</strong>
				    			</div>

				    			<blockquote>
				    				${res.posts[i].post_message}
				    			</blockquote>
				    		</div>
						</div>
						`);
					}
					$('.preloader-wrapper').remove();
					$('.center').remove();
				}
			} else {
				$(".post").html('<h1 class="center">Não há postagens. :(</h1>');
			}
		},
		error: (res, err) => {
			console.log('Response not getted');
		}
	});
});

/*
* Object Tools
*
* @function showOpt()
* @description -> that will be show other options
*/

var tools = {
	showOpt: () => {
		$("#third-line").hide();
		$("#fourth-line").show();
		
	},
	

}
function showTerms() {
	let element = "#terms";
	$(element).modal('open');

}
$('#yes').click(() => {
	tools.showOpt()
});

$('#form-register').submit((e) => {
	e.preventDefault();
	var data = {
		name: $("#name").val(),
		age: $("#age").val(),
		rg: $("#rg").val(),
		cpf: $("#cpf").val(),
		address: $("#address").val(),
		cep: $("#cep").val(),
		phone: $("#phone").val(),
		fb: $("#fb").val(),
		group_name: $("#group_name").val(),
		group_fb: $("#group_fb").val(),
		

	}
	var token = $('input[name=_token]');
	$.ajax({
		url: '/user/save',
		type: 'POST',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': token.val()
		},
		data: {
			name: $("#name").val(),
			age: $("#age").val(),
			rg: $("#rg").val(),
			cpf: $("#cpf").val(),
			address: $("#address").val(),
			cep: $("#cep").val(),
			phone: $("#phone").val(),
			fb: $("#fb").val(),
			group_name: $("#group_name").val(),
			group_fb: $("#group_fb").val(),
			password: $("#password").val(),
			civil_state: $("#civil_state").val(),
			term: $("#term").val()
		},
		beforeSend: () => {
			$('.reg-box').html(`<h1 class="loader center">Registrando...</h1>`);
		},
		success: (res) => {
			$(".loader").remove();
			$('.reg-box').html(`<h1 class="loader center">Inscrito com sucesso! <br> Redirecionando a página principal</h1>`);
			setTimeout(window.location.href="/", 3000);
		},
		error: (res, err) => {
			console.log(err);
		}
	});
});
$('#form-login').submit((e) => {
	e.preventDefault();
	
	var token = $('input[name=_token]');
	$.ajax({
		url: '/user/enter',
		type: 'POST',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': token.val()
		},
		data: {
			
			cpf: $("#cpf").val(),
			password: $("#password").val(),
		
		},
		beforeSend: () => {
			$('.login-box').html(`<h1 class="loader center">Entrando...</h1>`);
		},
		success: (res) => {
			$(".loader").remove();
			$('.login-box').html(`<h1 class="loader center">Logado com sucesso. <br> Redirecionando para a página principal</h1>`);
			setTimeout(window.location.href="/", 3000);
			
		},
		error: (res, err) => {
			console.log(err);
		}
	});
});

function loadImages(obj) {
	var id = $(obj).attr('data-id');
	var name = $(obj).attr('data-name');

	$("#album-modal").modal();
	$("#album-modal").modal('open');
	$("#album-title").html(name);
	$.ajax({
		url: '/album/load',
		type: 'GET',
		dataType: 'json',
		data: {
			id: id
		},
		beforeSend: () => {
			$("#album-content").html(`
				<br>
				<br>
				<div class="progress">
			      <div class="indeterminate center"></div>
			  </div>
			        
				`);
		},
		success: (res) => {
			
			
			if(res.photos.length > 0) {

				for(var i in res.photos) {
					$("#album-content").append(`
						
							<div class="col">
								<img class="materialboxed" width="150" src="images/image_gallery/${res.photos[i].image}">
							</div>	
						
						`);
				}
				$(".progress").remove();
			}
		},
		error: (res, err) => {
			console.log(err);
		}
	});
}

$('#logout-btn').click((e) => {

	e.preventDefault();

	$.ajax({
			url: '/logout',
			type: 'GET',
			dataType: 'json',
			success: (res) => {
				window.location.href="/";
			},

			error: (res, err) => {
				alert('Não foi possivel deslogar');
			}
		});
});