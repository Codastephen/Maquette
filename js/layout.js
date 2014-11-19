$(document).ready(function(){
	size();
	if($("#alertbox").is(":visible")){
		setTimeout(function(){
			$("#alertbox").fadeOut();
		}, 5000);
	}
	$("#myModal").modal();
});

$(window).resize(function(){
	size();
});

function size(){
	$(".wrapper-img").css("height",Math.ceil($(window).height()/4));
	$(".wrapper-img-admin").css("height",Math.ceil($(window).height()/2));
	$(".top").css("height",Math.ceil($(window).height()/4));
	$(".tableresize").css("height",$(window).height()-(120 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
}