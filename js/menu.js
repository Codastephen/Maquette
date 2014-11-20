$(document).ready(function(){
	if(window.location.hash.length > 0){
		$('#myTab a[href='+window.location.hash+']').trigger("touchend");
	}else{
		$('#myTab a[href=#home]').trigger("touchend");
	}
});

$('#myTab a').on("click",function (e) {
  e.preventDefault()
  $(this).tab('show');
  setUrlBar($(this).attr('href'));
  handlerlink($(this));
})

$('#myTab a').on("touchend",function (e) {
  e.preventDefault()
  $(this).tab('show');
  setUrlBar($(this).attr('href'));
  handlerlink($(this));
})

function setUrlBar(href){
	window.location.hash = href;
}

function handlerlink(item){
	$("ul.nav > li > a > div.wrapper-img").removeClass("active");
	item.find("div.wrapper-img").addClass("active");
	$("ul.nav > li > a > div.wrapper-img-admin").removeClass("active");
	item.find("div.wrapper-img-admin").addClass("active");
	$("ul.nav > li > a > div.wrapper-img-user").removeClass("active");
	item.find("div.wrapper-img-user").addClass("active");
	resetTable();
	$(".tableresize").css("height",$(window).height()-(120 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
}