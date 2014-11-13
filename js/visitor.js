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

function validate(index){
	var validator = "Etes-vous sur?<button class='btn btn-success' style='opacity:0' onclick='deconnexion.php?id="+index+"&validate=true'>Oui</button>";
	alert($(this));
}

function showValidate(){
	$(this).next().fadeIn();
	$(this).fadeOut();
}