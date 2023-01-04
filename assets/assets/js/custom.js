$(document).ready(function(){
	$(".remove-btn").click(function(e){
		var $dataUrl = $(this).data("url");
		Swal.fire({
			title: 'Är du saker',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ja, radera den!'
		}).then((result) => {
			if (result) {
				window.location.href = $dataUrl;
			}
		});
	})
})