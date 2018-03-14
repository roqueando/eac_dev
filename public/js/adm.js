// JS goes here
// 
var xsrf_token = $('meta[name="csrf-token"]').attr('content');
var count = 0;

/**
 * Post object
 * There has those stuffs to create, edit and delete an post.
 * 
 * @function new()
	* @description Made an AJAX request to create an Post
 */


$(document).ready(() => {
	$('select').material_select();
})
var token = $('input[name=_token]');;

$("#newpost-form").submit((e) => {
	e.preventDefault();

	var postTitle = $("#post-title").val();
	var postAuthor = $("#post-author").val();
	var postText = $("#post-text").val();
	var postImg = $("#post-img")[0].files[0];
	var postVideo = $("#post-video")[0].files[0];
	

	
	var formData = new FormData();
	formData.append('title', postTitle);
	formData.append('author', postAuthor);
	formData.append('text', postText);
	formData.append('img', postImg);
	formData.append('video', postVideo);

	$.ajax({
			type: 'POST',
			url: '/182.753.488-94/dashboard/insert',
			
			dataType: 'json',
	        contentType: false,
	        processData: false,
	        headers: {
	          'X-CSRF-TOKEN': token.val()
	        },
			data: formData,
			success: (res) => {
				Materialize.toast('Post criado!', 3000);
			},
			error: (res, err) => {
				Materialize.toast('Não foi possível fazer esta ação. :c', 3000);
				console.log(err); 
			}
		});
});

function showImgField() {
	$("#video-line").hide();
	$("#choose-field").hide();
	$("#img-line").show();
}

function showVideoField() {
	$("#video-line").show();
	$("#choose-field").hide();
	$("#img-line").hide();
}

$("#newalbum-form").submit((e) => {
	e.preventDefault();

	$.ajax({
		
		type: 'POST',
		url: '/182.753.488-94/dashboard/createalbum',
		dataType: 'json',
		headers: {
	          'X-CSRF-TOKEN': token.val()
	    },
	    data: {
	    	name: $("#album-name").val()
	    },
	    success: (res) => {
	    	console.log('foi');
	    	Materialize.toast('Album criado!', 3000);
	    },
	    error: (res, err) => {
	    	console.log(err);
	    }

	});
});

$("#add-form").submit((e) => {
	e.preventDefault();
	var album_image = $("#album-img")[0].files[0];
	var album_id = $("#album-id").val();
	var formData = new FormData();
	formData.append('album_image', album_image);
	formData.append('album_id', album_id);
	$.ajax({
		
		type: 'POST',
		url: '/182.753.488-94/dashboard/insertphoto',
		dataType: 'json',
		contentType: false,
	    processData: false,
		headers: {
	          'X-CSRF-TOKEN': token.val()
	    },
	    data: formData,
	    success: (res) => {
	    	console.log('foi');
	    	Materialize.toast('Foto adicionada!', 3000);
	    },
	    error: (res, err) => {
	    	console.log(err);
	    }

	});
});

function deleteTraject(obj, counter) {
	
	
	var el = $(obj).find("#"+counter);
	el.remove("#"+counter);
}

function addTraject() {
	
	count++
	
	$("#traject-row").append(`
		<div class="trj-div row" id="${count}">
			<div class="col s4" >
				<input type="number" min="1" placeholder="Numero"  class="trj">
			</div>
			<div class="col s2" id="added">
				<button class="btn green accent-4"  style="display:none">Adicionado</button>
				<button type="button" class="btn-floating waves-effect" id="add-btn"><i class="material-icons green accent-2" onclick="insertTraject()">check</i></button>
			</div>
			<div class="col s1" id="other-added">
				<button type="button" class="btn-floating" id="rmv-btn" onclick="deleteTraject(this, ${count})"><i class="material-icons red accent-2" >close</i></button>
			</div>
		</div>
		`);
}
var trajects = [];

function insertTraject() {
	var value = $(`#${count} input[type="number"]`).val();
	trajects.push(value);
	console.log(trajects);
	$("#rmv-btn").remove();
	$("#add-btn").remove();
	$(`#${count} #added`).append(`
		<span class="btn green accent-4" style="font-size: 12x">Adicionado</span>
		`);
}

$("#newrace-form").submit((e) => {
	e.preventDefault();

	let race_name = $("#race-name").val();
	let choose = $("#typeRace").val();
	let race_local = $('#race_local').val();
	let race_date = $('#race_date').val();
	let race_hour = $('#race_hour').val();
	let race_date_kit = $('#race_date_kit').val();
	let race_value = $('#race_value').val();
	let race_description = $('#race_description').val();



	$.ajax({
		url:'/182.753.488-94/dashboard/insert_race',
		type: 'POST',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': token.val(),
		},
		data: {
			trajects: trajects,
			choose: choose,
			race_name: race_name,
			race_local: race_local,
			race_date: race_date,
			race_hour: race_hour,
			race_date_kit: race_date_kit,
			race_value: race_value,
			race_description: race_description,

		},
		success: (res) => {
			Materialize.toast('Corrida criada com sucesso', 3000, 'rounded');
		},
		error: (res, err) => {
			
			Materialize.toast('Não foi possível realizar esta ação', 3000, 'rounded');
		}

	});
});



function turn(value) {
	let opt = $("#typeRace");

	if(value == 0) {
		$("#racing").show();
		$("#walking").hide();
	}else{
		$("#walking").show();
		$("#racing").hide();
	}
}

$("#deletepost-form").submit((e) => {
	e.preventDefault();

	var post = $("#posts").val();

	$.ajax({
		url: '/182.753.488-94/dashboard/deletepost',
		type: 'DELETE',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': xsrf_token
		},
		data: {
			id: post,
		},
		success: (res) => {
			Materialize.toast('Postagem deletada com sucesso', 3000, 'rounded');
		},
		error: (res, err) => {
			Materialize.toast(err, 3000, 'rounded');
		}

		

	});

});

$("#deleterace-form").submit((e) => {
	e.preventDefault();

	var race = $("#races").val();

	$.ajax({
		url: '/182.753.488-94/dashboard/deleterace',
		type: 'DELETE',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': xsrf_token
		},
		data: {
			id: race,
		},
		success: (res) => {
			Materialize.toast('Corrida deletada com sucesso', 3000, 'rounded');
		},
		error: (res, err) => {
			Materialize.toast(err, 3000, 'rounded');
		}

		

	});

});

$("#deletegallery-form").submit((e) => {
	e.preventDefault();

	var gallery = $("#galeries").val();

	$.ajax({
		url: '/182.753.488-94/dashboard/deletegallery',
		type: 'DELETE',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': xsrf_token
		},
		data: {
			id: gallery,
		},
		success: (res) => {
			Materialize.toast('Galeria deletada com sucesso', 3000, 'rounded');
		},
		error: (res, err) => {
			Materialize.toast(err, 3000, 'rounded');
		}

		

	});

});