$(document).ready(function () {
	$(document).on("click", "button#seeDetail", function() {
		let key = $(this).data("key");
		showDetailAction(key);

	});

	$(document).on("hidden.bs.modal", "#showDetail", function (e) {
	    const url = new URL(window.location.href);
	    url.searchParams.delete(constParamDetail);
	    window.history.replaceState(null, null, url);
	});
});