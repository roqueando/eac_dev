var xsrf_token = $('meta[name="csrf-token"]').attr('content');

function showMessageErrors (msg) {

      $(".print-error-msg").find("ul").html('');

      $(".print-error-msg").css('display','block');

      $.each( msg, function( key, value ) {

        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

      }); 
}

$(document).ready(function() {
	
	$(".slider").slider({
		height: 500,
	});
	$('#contact-number-for-incidents').mask('(99) 99999-9999');
	$("#cpf").mask('999.999.999-99');
	$("#rg").mask('99.999.999-9');
	$("#cep").mask('99999-999');
	$("#phone").mask('(99) 99999-9999');
	var modals = {
		results: $("#results").modal(),
		next_race: $("#next-race").modal(),
		terms: $("#terms").modal(),
		subscribe: $("#subscribe-modal").modal(),
		card: $("#card-modal").modal(),
		
	}
    $('.parallax').parallax();
	modals.results;
	modals.card;
	modals.next_race;    
	modals.terms;
	$('select').material_select();
	$('.dropdown-button').dropdown({
		belowOrigin:true
	});
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

				    			<video width="100%" height="500" controls class="responsive-video">
								  <source src="images/videos/${res.posts[i].video}" type="video/mp4" >
								</video>
				    			<blockquote>
				    				${res.posts[i].post_message}
				    			</blockquote>

				    			
				    			
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
				$(".post").html(`
					<h3 class="center-align" style="padding: 16px; background-color: #e0e0e0; border-radius: 5px;">Não há postagens.</h3>
					`);
			}
		},
		error: (res, err) => {
			console.log('Response not getted');
		}
	});


	$.ajax({
			url: '/getraces',
			type: 'GET',
			dataType: 'json',
			success: (res) => {
				if(res.races.length > 0) {


					for(var i in res.races) {
						String.prototype.insertAt=function(index, string) { 
						  return this.substr(0, index) + string + this.substr(index);
						}
						let trajects = JSON.parse(`[${res.races[i].trajectOpt}]`);

						let correct = trajects[0].join('km, ');
						let morecorret = correct += 'km';
						// correct.insertAt(correct.length, "km");
						console.log(morecorret);
						$("#races-collapse").append(`

							<li class="col s4 ">
								<input type="hidden" value="${res.races[i].id}" id="race_id">
							    <div class="collapsible-header "><i class="material-icons ">directions_run</i>${res.races[i].race_name}</div>
							    <div class="collapsible-body blue lighten-2">
								    <blockquote class="center-align" style="color: #fff">
								    	Localização: ${res.races[i].localization} <br>
								    	Trajetos: ${morecorret} <br>
								    	Data: ${res.races[i].date_marked} <br>
								    	Horário: ${res.races[i].hour_marked} <br>
								    	Descrição: ${res.races[i].description} <br>
								    	Valor: ${res.races[i].race_value} <br>
								    	<button class="btn btn-large green accent-4 center-align" onclick="openSubscribe(${res.races[i].id})" id="race_btn">Inscreva-se</button>
								    </blockquote>

							    </div>
							</li>

						`);
					}

				} else {
					$("#races-content").html(`
						<h6 class="center-align" style="padding: 16px; background-color: #e0e0e0; border-radius: 5px;">Não há corridas no momento</h6>
						`);
				}
			},
			error: (res, err) => {
				console.log('error: ', err);
			}
	});
});


/**
 * [tools: give a showOpt method]
 * @type {Object}
 */
var tools = {
	showOpt: () => {
		$("#third-line").hide();
		$("#fourth-line").show();
		
	},
}



function openSubscribe(id) {
	if(localStorage.getItem('user_id') !== null){
		$.ajax({
			url: '/getracesfromid',
			type: 'GET',
			dataType: 'json',
			data: {
				id: id
			},
			success: (res) => {
				var traj = res.race[0].trajectOpt;

				traj = traj.split(',');
				$("#race_id").val(id);
				$("#race_value").val(res.race[0].race_value);
				$("#hour").val(res.race[0].hour_marked);
				$("#local").val(res.race[0].localization);
				$("#desc").val(res.race[0].description);
				$("#traject-choose").append(`
					<option>6km</option>
					`)
			},
			error: (res, err) => {
				console.log('error: ', err);
			}
		});
		$("#subscribe-modal").modal('open');
		
	} else {
		alert('Voce precisa estar logado para se inscrever');
	}
	

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
	var loader = `
		     <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
	`;
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
			Materialize.toast('Registrando...', 1000, 'rounded');
		},
		success: (res) => {
			Materialize.toast('Registrado com sucesso!', 1000, 'rounded');
			$('.reg-box').html(`<h4 class="loader center" style="background-color: #3498db; padding: 16px;">Logado com sucesso. <br> Redirecionando para a página principal</h4>`);
			setTimeout(window.location.href="/", 3000);
		},
		error: (res, err) => {
			for(var i in res.responseJSON.Error) {
				Materialize.toast(res.responseJSON.Error[i], 3000, "rounded");
			}
		}
	});
});
$('#form-login').submit((e) => {
	e.preventDefault();
	var loader = `
		     <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
	`;
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
		
		success: (res) => {
			localStorage.setItem("user_id", res.user.id);
			localStorage.setItem("user_cpf", res.user.cpf);
			localStorage.setItem("user_name", res.user.name);
			$('.login-box').html(`<h6 class="loader center" style="background-color: #3498db; padding: 16px;">Logado com sucesso. <br> Redirecionando para a página principal</h6>`);
			setTimeout(window.location.href="/", 3000);
			
		},
		error: (res, err) => {
			for(var i in res.responseJSON.Error) {
				Materialize.toast(res.responseJSON.Error[i], 3000, "rounded");
			}
			

		}
	});
});

$("#subscribe-form").submit((e) => {
	e.preventDefault();

	var infos = {
		blouse: $("#blouse").val(),
		user_id: localStorage.getItem('user_id'),
		race_id: $("#race_id").val(),
		race_value: $("#race_value").val(),
		incident: $("#contact-number-for-incidents").val(),
		status: "waiting",
	};

	$.ajax({
		url: "/user/subscribe",
		type: "POST",
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': xsrf_token,
		},
		data: infos,
		success: (res) => {
			$("#subscribe-modal").modal('close');
			Materialize.toast("Inscrição concluída, vá até seu painel para efetuar o pagamento", 3000, "rounded");
		},
		error: (res, err) => {
			console.log('Nao foi possivel');
		}

	});
});

// $("#payment-form").submit((e) => {

// 	e.preventDefault();
// 	var boletoObj = {
// 		"amount": 3500,
// 		"api_key": "ak_test_qfLQjleBjjHCErH5yUmovoe7O6LiFb",
// 		"payment_method": "boleto",
// 		"postback_url": "http://requestb.in/pkt7pgpk",
// 		"customer":  {
// 			"name": "Jon Snow",
// 			"document_number": "18175248793"
// 		}
// 	};
// 	var boletoObj = JSON.stringify(boletoObj);
// 	var bltParsed = JSON.parse(`[${boletoObj}]`);
// 	console.log(bltParsed);

// 	var boleto = `
// 		{
// 	"amount": 2100, 
//     "api_key": "ak_test_qfLQjleBjjHCErH5yUmovoe7O6LiFb",
//     "payment_method": "boleto",
// 	 "customer":{
//         "type": "individual",
//         "country": "br",
//         "name": "Daenerys Targaryen",
//         "documents": [{
//             "type": "cpf",
//             "number": "00000000000"
//         }]
//     }
// }

// 	`;
// 	$.ajax({

// 		url: 'https://api.pagar.me/1/transactions',
// 		type: 'POST',
// 		dataType: 'json',
// 		headers: {
// 			'Content-Type': 'application/json',
// 			"Access-Control-Allow-Headers": '*',
// 		},
// 		data: boleto,
// 		success: (res) => {
// 			console.log('FOI!');
// 		},
// 		error: (res, err) => {
// 			console.log('Não foi');
// 		}

// 	});

// });

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
						
							<div class="col s6">
								<img class="materialboxed" width="350" src="images/image_gallery/${res.photos[i].image}">
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
				localStorage.removeItem('user_id');
				window.location.href="/";
			},

			error: (res, err) => {
				alert('Não foi possivel deslogar');
			}
		});
});

function cancel(id) {
	$.ajax({
		url: "/user/cancelsubscribe",
		type: "DELETE",
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': xsrf_token
		},
		data: {
			id: id,
		},

		success: (res) => {
			Materialize.toast("Inscrição cancelada com sucesso!", 3000, "rounded", function() {
				window.location.href = "/myraces";
			});
		},
		error: (res, err) => {
			Materialize.toast("Não foi possível realizar esta ação", 3000, "rounded",);
		},

	})
}

function card_pay() {

	var button = $("#pay-button");
	var checkout = new PagarMeCheckout.Checkout({
        encryption_key: 'ek_test_uTA0rHx8H9My6blPZbWPIpNN0aT2i4',
        success: function(data) {
          console.log(data);
        },
        error: function(err) {
        	console.log(err);
        },
        close: function() {
        	console.log('The modal has been closed.');
        }
    });

	checkout.open({
		amount: 8000,
		buttonText: 'Pagar',
		buttonClass: 'botao-pagamento',
		customerData: 'true',
		createToken: 'true',
		payment_method: 'credit_card',
		api_key: "ak_test_qfLQjleBjjHCErH5yUmovoe7O6LiFb",
		

	});
}

function boleto_pay() {

		var amount = $("#value").val();
		amount = amount.replace('.', '');
		var cpf = localStorage.getItem('user_cpf');
		cpf  = cpf.replace(/-|/g, '');
		cpf = cpf.replace('.', '');
		cpf = cpf.replace('.', '');
		var boleto = `
			{
		"amount": "${amount}", 
	    "api_key": "ak_test_qfLQjleBjjHCErH5yUmovoe7O6LiFb",
	    "payment_method": "boleto",
		 "customer":{
	        "type": "individual",
	        "country": "br",
	        "name": "${localStorage.getItem('user_name')}",
	        "documents": [{
	            "type": "cpf",
	            "number": "${cpf}"
	        }]


	   	 }
		}

		`;

	
		$.ajax({

			url: 'https://api.pagar.me/1/transactions',
			type: 'POST',
			dataType: 'json',
			headers: {
				'Content-Type': 'application/json',
				"Access-Control-Allow-Headers": '*',
			},
			data: boleto,
			success: (res) => {
				Materialize.toast(`Boleto gerado com sucesso, acesse  <a href="${res.boleto_url}" style="padding-left: 2px; padding-right: 2px; color: blue"> este link </a> para imprimir e pagar!`, 10000, "rounded", function() {
					window.location.href = res.boleto_url;
				});
			},
			error: (res, err) => {
				console.log('Não foi');
			}

		});

}
