$("table#tablevisitor tr").click(function(){
	$("table#tablevisitor tr").removeClass("info");
	$(this).addClass('info');
})