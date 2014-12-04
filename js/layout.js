$(document).ready(function(){
	size();
	if($("#alertbox").is(":visible")){
		setTimeout(function(){
			$("#alertbox").fadeOut();
		}, 5000);
	}
	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
		function decode(s) {
			return decodeURIComponent(s.split("+").join(" "));
		}

		$_GET[decode(arguments[1])] = decode(arguments[2]);
	});
	if($_GET['helper']==0){
		$("#myModal").modal();
	}
	
});

$(window).resize(function(){
	size();
});

function size(){
	$(".wrapper-img").css("height",Math.ceil($(window).height()/4));
	$(".wrapper-img-admin").css("height",Math.ceil($(window).height()/2));
	$(".wrapper-img-user").css("height",Math.ceil($(window).height()/3));
	$(".top").css("height",Math.ceil($(window).height()/4));
	$("#defilor").css("width",$("#defilor-container").css("width"));
	$(".tableresize").css("height",$(window).height()-(120 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
	$("#listing").css("height",$(window).height()-(20 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
}

$("#helper").on("touchend",function (e) {
	if($(this).css("height")=="50px")
		$(this).css("height","250px");
	else
		$(this).css("height","50px");
});