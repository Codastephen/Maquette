$(document).ready(function(){
	size();
	if($("#alertbox").is(":visible")){
		setTimeout(function(){
			$("#alertbox").fadeOut();
		}, 5000);
	}
	handlerUrl();
});

$(window).resize(function(){
	size();
});

function size(){
	$(".wrapper-img").css("height",Math.ceil($(window).height()/4));
	$(".top").css("height",Math.ceil($(window).height()/4));
	$("#defilor").css("width",$("#defilor-container").css("width"));
	$(".tableresize").css("height",$(window).height()-(120 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
	$("#listing").css("height",$(window).height()-(20 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
	$("#frameMap").attr("height",$(window).height()-(70 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
	$("#frameMap").parent().css("height",$(window).height()-(70 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
}

/**
 * Gère l'url du site pour afficher la bonne page
 */
function handlerUrl(){
	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
		function decode(s) {
			return decodeURIComponent(s.split("+").join(" "));
		}

		$_GET[decode(arguments[1])] = decode(arguments[2]);
	});

	var index = window.location.pathname.lastIndexOf("/") + 1;
	var filename = window.location.pathname.substr(index);
}