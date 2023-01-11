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
	$(".content-container, .image_list_container").on('change', '.isActive', function(){
		var $data = $(this).prop("checked");
		var $data_url = $(this).data("url");
	// $data och och $dataUrl !== "undefined"
		if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
		//postMethod tar 3 params URL, objeckt data, func
			$.post($data_url, { data : $data}, function(response){});
		}
	})

//isCover-prop
	$(".image_list_container").on('change', '.isCover', function(){
		var $data = $(this).prop("checked");
		var $data_url = $(this).data("url");
	// $data och och $dataUrl !== "undefined"
		if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
		//postMethod tar 3 params URL, objeckt data, func
			$.post($data_url, { data : $data}, function(response){
				$(".image_list_container").html(response);

				$('[data-switchery]').each(function(){
					var $this = $(this),
					color = $this.attr('data-color') || '#188ae2',
					jackColor = $this.attr('data-jackColor') || '#ffffff',
					size = $this.attr('data-size') || 'default'

					new Switchery(this, {
						color: color,
						size: size,
						jackColor: jackColor
					});
				});

			});
		}
	})

//sortable snitt
	$(".sortable").sortable();

//function(event, ui)
	$(".sortable").on("sortupdate", function(event, ui){
		var $data = $(this).sortable("serialize");
		var $data_url = $(this).data("url");

		//Why function(response)? -"answer for URL"
		$.post($data_url, { data : $data}, function(response){})
	})

//dropzone
	var uploadSection = Dropzone.forElement("#dropzone");

	uploadSection.on("complete", function(file){

		var $data_url = $("#dropzone").data("url");

		$.post($data_url, {}, function(response){
			$(".image_list_container").html(response);
			$('[data-switchery]').each(function(){
				var $this = $(this),
				color = $this.attr('data-color') || '#188ae2',
				jackColor = $this.attr('data-jackColor') || '#ffffff',
				size = $this.attr('data-size') || 'default'

				new Switchery(this, {
					color: color,
					size: size,
					jackColor: jackColor
				});
			});
		});
	})
})