// JS goes here
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


$("#newrace-form").submit((e) => {
	e.preventDefault();

	let race_name = $("#race-name").val();
	console.log(race_name);

	let n1 = $(`#trj-1`).val();
	let n2 = $(`#trj-2`).val();
	let choose = $("#typeRace").val();
	
	$.ajax({
		url:'/182.753.488-94/dashboard/insert_race',
		type: 'POST',
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': token.val(),
		},
		data: {
			choose: choose,
			race_name: race_name,
			trj1: n1,
			trj2: n2,
		},
		success: (res) => {
			console.log('Foi');
		},
		error: (res, err) => {
			
			console.log(err);
		}

	})
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

async function addTraject() {
	
	count++
	await $("#traject-row").append(`
	<div class="trj-div" id="${count}">
		<div class="col s3" >
			<input type="number" min="1" placeholder="Numero"  class="trj">
		</div>
		<div class="col s8" >
			<input type="text" placeholder="Nome do trajeto (ex.: 6km)"  class="trj">
		</div>

		<div class="col s1">
			<button class="btn-floating"><i class="material-icons red accent-2" onclick="deleteTraject('#trj-div')">close</i></button>
		</div>
	</div>
		`);
}

function deleteTraject(selector) {
	$(selector).remove();
}