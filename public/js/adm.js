// JS goes here


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