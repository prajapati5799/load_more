jQuery(function ($) {
	// use jQuery code inside this to avoid "$ is not defined" error
	let currentPage = 1;
	jQuery(".load-more").click(function () {
		currentPage++;
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: my_ajax_object.ajax_url,
			data: {
				action: "get_data",
				paged: currentPage,
			},
			beforeSend: function () {
				jQuery(".load-more").text("Loading...");
			},
			success: function (res) {
				// console.log(res.html);return false;
				if (currentPage == res.max) {
					jQuery(".load-more").hide();
				}
				jQuery(".load-more").text("load more");
				jQuery(".card-body").append(res.html);
			},
		});
	});
});
