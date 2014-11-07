$("table#tablevisitor tr").click(function(){
	$("table#tablevisitor tr").removeClass("success");
	$(this).addClass('success');
	$("table#tablevisitor tr").find("a.btn").css('opacity',0);
	$(this).find("a.btn").css('opacity',1);
})