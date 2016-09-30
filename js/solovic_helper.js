$(document).ready(
	function () {

	}
);

function call_nextpage(page_id, element_id, callback, url = '') {
	let data_action = "get_next_page";
	if (url != '') data_action = "get_specific_page";
	$.ajax({
		type: "post",
		dataType: "json",
		url: solovicAjax.ajaxurl,
		data: {action: data_action, page_context: {'page_id': page_id, 'element_id': element_id, 'url': url}},
	}).done(function (response) {
		if (response.type == "success") {
			callback(response);
		}
		else {
			alert("error")
		}
	});
}