$("table#tablevisitor tr").click(function(){
	$("table#tablevisitor tr").removeClass("success");
	$(this).addClass('success');
	$("table#tablevisitor tr").find("a").fadeOut();
	$(this).find("a").fadeIn();
})

$(document).ready(function(){
	$(".wrapper-img").css("height",Math.ceil($(window).height()/4));
	$(".top").css("height",Math.ceil($(window).height()/4));
});

function showValidate(){
	$(this).next().fadeIn();
	$(this).fadeOut();
}