//Import all necessary helper (if any)
import Helper from "../utils/Helper";

const arrayHandler = () => {
	console.log("work");
	return Helper.nodeToArray("Hii its work");
};

const ajaxRequest = () => {
	const data = {
		nonce: parameters.ajax_tes.nonce,
		action: parameters.ajax_tes.action,
		tes_parsing_data: "ini adalah tess",
	};

	$.ajax({
		type: "POST",
		data: data,
		url: parameters.url_admin_ajax,
		dataType: "json", // and this
	}).done(function (result) {
		console.log(result);
	});
};

const changeText = () => {
	const selector = document.querySelector(".entry-title a");
	selector.innerText = "Workinggg";
	console.log("changetext");
};

const main = () => {
	changeText();
	ajaxRequest();
	arrayHandler();
};

export default { main };