// here i mount my functions and Ajax requests
// for this i'm get more control and a clean code. :)

/*
*	@author Vítor Roque <github.com/roqueando>
*/
exports.new = (title, author, post) => {
		var token = $('input[name=_token]');
		$.ajax({
			url: '/insert',
			type: 'POST',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': token.val()
			},
			success: (res) => {
				Materialize.toast('Post criado!', 3000);
			}
		});
}