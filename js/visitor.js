$("table#tablevisitor tr").click(function(){
	$("table#tablevisitor tr").removeClass("success");
	$(this).addClass('success');
	$("table#tablevisitor tr").find("button").css('opacity',0);
	$(this).find("button").css('opacity',1);
})

$(document).ready(function(){
	$(".wrapper-img").css("height",$(window).height()/4);
	$(".top").css("height",$(window).height()/4);
});

function showValidate(){
	$(this).next().fadeIn();
	$(this).fadeOut();
}