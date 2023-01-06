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

//prop("checked") => True eller False
$(".isActive").change(function(){
	var $data = $(this).prop("checked");
	var $data_url = $(this).data("url");
	// $data och och $dataUrl !== "undefined"
	if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
		//postMethod tar 3 params URL, objeckt data, func
		$.post($data_url, { data : $data}, function(response){});
	}
})
})