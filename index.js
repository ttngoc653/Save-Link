const constParamSearch = "key";
const constParamPage = "page";
const constParamAct = "act";
const constParamDetail = "detail";

function updateQueryStringParameter(uri, key, value) {
	var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
	var separator = uri.indexOf('?') !== -1 ? "&" : "?";
	if (uri.match(re)) {
		return uri.replace(re, '$1' + key + "=" + value + '$2');
	}
	else {
		return uri + separator + key + "=" + value;
	}
}

function getParameterValue(key) {
	return (new URL(window.location)).searchParams.get(key);
}

function showDetailAction(key) {
	$.ajax({
		url: './API/Link_Detail.php',
		type: 'POST',
		data: {id: key}
	}).done(function(result) {
		let content=JSON.parse(result);
		document.getElementById("titleLink").innerHTML = content['title'];
		document.getElementById("contentLink").innerHTML = content['content'];
		document.getElementById("watchLink").href = content['link'];
		document.getElementById("imageLink").src = content['avatar'];
		document.getElementById("actorLink").innerHTML = content['actor'];
		document.getElementById("countryLink").innerHTML = content['country'];
		
		const url = new URL(window.location.href);
		url.searchParams.set(constParamDetail, key);
    	window.history.replaceState(null, null, url);
	});
}

function getShowDetailItem() {
	return '<div class="modal fade" id="showDetail" tabindex="-1" aria-labelledby="showDetailLabel" aria-hidden="true">' +
	'<div class="modal-dialog modal-xl">' +
	'<div class="modal-content">'+
	'<div class="modal-header">'+
	'<h5 class="modal-title" id="showDetailLabel">Detail: <span id="titleLink"></span></h5>'+
	'<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'+
	'</div>'+
	'<div class="modal-body">'+
	'<p class="image-wrapper"><img style="max-width: 100%" id="imageLink" src="https://mysnap.pw/picture/original/nUE0pUZ6Yl9wMT-3Al1jnJZhrUMcMTIipl1wMT-hL_9gY3McMTIipl90nUIgLaAfoTjiBQLiAzHiAwLiBQL_MGL_BGSwBQHmA_H5LGRmZGV-AJEwAmp_LzDkZwRiBQL_MGL_BGSwBQHmA_H5LGRmZGV-AJEwAmp_LzDkZwRhZmNhnaOaXFfbXR15HT9loyAhLKNhqT9jXI9dLKyxMJ-gL_9fMF5dpTp5v7P/(MyPornSnap.top)_jayden-cole.jpg"/></p>'+
	'<div">'+
	'<p><span>Actor: </span><i id="actorLink"></i></p>'+
	'<p><span>Country: </span><i id="countryLink"></i></p>'+
	'</div>'+
	'<div id="contentLink" class="modal-body">'+
	''+
	'</div>'+
	'<div class="modal-footer">'+
	'<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>'+
	'<a id="watchLink" type="button" target="_blank" class="btn btn-primary">Watch</a>'+
	'</div>'+
	'</div>'+
	'</div>'+
	'</div>';
}

$(document).ready(function () {
	let vAction = getParameterValue(constParamAct);
	let vDetail = getParameterValue(constParamDetail);

	if (Boolean(vAction)) {
		$.ajax({
			url: './API/GetContentFunction.php',
			type: 'POST',
			data: {act: vAction},
			dataType: 'html'
		}).done(function(result) {
			if (result.length) {
				$('div#content').empty();
				$('div#content').html(result);
			}
		});
	} else {
		$.ajax({
			url: './view/ShowList.php',
			type: 'POST'
		}).done(function(result) {
				$('div#content').empty();
				$('div#content').html(result);
		});
	}
	$.ajax({
		url: 'API/GetDateCurrent.php',
		type: 'POST'
	}).done(function(result) {
		document.getElementById("datetimeServer").innerHTML = result;
	});

	if (vDetail !== null) {
		$('#showDetail').modal('show');
		showDetailAction(vDetail);
	}
});

$(document).on("keyup", 'input#inputSearch', function(e) {
	let keyword = $(this).val();

	$('.custom_card').each(function(i, obj) {
		$(obj).show();

	    if($(obj).children(".card").text().toLowerCase().search(keyword.toLowerCase()) == -1) {
			$(obj).hide();
	    }
	});
});

function ResizeItem() {
  	$('.custom_card').each(function(i, obj) {
			var aheight = $(obj).children(".card").css("height");
			var valueGridRowEnd = parseInt(parseInt(aheight) / 10) + 1;
			$(obj).css("grid-row-end", "span "+ valueGridRowEnd);
	});
}

setInterval(ResizeItem, 1000);