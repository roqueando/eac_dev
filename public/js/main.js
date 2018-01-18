
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
});

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