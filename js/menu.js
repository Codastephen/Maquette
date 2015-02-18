$(document).ready(function(){
	if(window.location.hash.length > 0){
		$('#myTab a[href='+window.location.hash+']').trigger("touchend");
	}else{
		$('#myTab a[href=#home]').trigger("touchend");
	}
});

$('#myTab a').on("click",function (e) {
	if($(this).attr('href').indexOf("#")==0){
		e.preventDefault();
		$(this).tab('show');
		setUrlBar($(this).attr('href'));
		handlerlink($(this));
	}
})

$('#myTab a').on("touchend",function (e) {
	if($(this).attr('href').indexOf("#")==0){
		e.preventDefault();
		$(this).tab('show');
		setUrlBar($(this).attr('href'));
		handlerlink($(this));
	}
})

function setUrlBar(href){
	window.location.hash = href;
}

function handlerlink(item){
	$("ul.nav > li > a > div.wrapper-img").removeClass("active");
	item.find("div.wrapper-img").addClass("active");
	resetTable();
	$(".tableresize").css("height",$(window).height()-(120 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
}