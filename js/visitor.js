$("table#tablevisitor tr").click(function(){
	$("table#tablevisitor tr").removeClass("success");
	$(this).addClass('success');
	$("table#tablevisitor tr").find("a").fadeOut();
	$(this).find("a").fadeIn();
})

$(document).ready(function(){
	size();
});

$(window).resize(function(){
	size();
});

function showValidate(){
	$(this).next().fadeIn();
	$(this).fadeOut();
}

$("ul.nav > li > a").click(function(){
	$("ul.nav > li > a > div.wrapper-img").removeClass("active");
	$(this).find("div.wrapper-img").addClass("active");
})

function size(){
	$(".wrapper-img").css("height",Math.ceil($(window).height()/4));
	$(".top").css("height",Math.ceil($(window).height()/4));
	$("#tableresize").css("height",$(window).height()-(120 + parseInt($('#toto').css('margin-top'), 10) + $('#toto').outerHeight()));
}