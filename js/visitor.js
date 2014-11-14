$(document).ready(function(){
	size();
});

$(window).resize(function(){
	size();
});

var scrolling = false;

$('div.tableresize').bind('scroll', function() {
	scrolling = true;
})

$("table.tablevisitor tr").on("click",function(){
	handlertable($(this));
})

$("table.tablevisitor tr").on("touchend",function(){
	handlertable($(this));
})

function handlertable(item){
	if(scrolling){
		scrolling = false;
	}else{
	$("table.tablevisitor tr").removeClass("success");
	item.addClass('success');
	$("table.tablevisitor tr").find("a").hide();
	item.find("a").show();
}
}
function resetTable(){
	$("table.tablevisitor tr").removeClass("success");
	$("table.tablevisitor tr").find("a").hide();
	$(".tableresize").animate({scrollTop : 0},1);
}

function showValidate(){
	$(this).next().fadeIn();
	$(this).fadeOut();
}

$("ul.nav > li > a").on("click",function(){
	handlerlink($(this));
})

$("ul.nav > li > a").on("touchend",function(){
	handlerlink($(this));
})

function handlerlink(item){
	$("ul.nav > li > a > div.wrapper-img").removeClass("active");
	item.find("div.wrapper-img").addClass("active");
	resetTable();
}


function size(){
	$(".wrapper-img").css("height",Math.ceil($(window).height()/4));
	$(".top").css("height",Math.ceil($(window).height()/4));
	$(".tableresize").css("height",$(window).height()-(120 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
}