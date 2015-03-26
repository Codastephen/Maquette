$(document).ready(function(){
	if(window.location.hash.length > 0){
		$('#myTab a[href='+window.location.hash+']').trigger("touchend");
	}else{
		$('#myTab a[href=#home]').trigger("touchend");
	}
	//$("#keyboard-container").hide();
	//$("#keyboard-container").center();
});

/*var write = null;
$(function(){
	var shift = false,
	capslock = false;

	$('#keyboard li').click(function(){
		var $this = $(this),
        character = $this.html(); // If it's a lowercase letter, nothing happens to this variable

        if ($this.hasClass('left-shift') || $this.hasClass('right-shift')) {
        	$('.letter').toggleClass('uppercase');
        	$('.symbol span').toggle();

        	shift = (shift === true) ? false : true;
        	capslock = false;
        	return false;
        }

        if ($this.hasClass('capslock')) {
        	$('.letter').toggleClass('uppercase');
        	capslock = true;
        	return false;
        }

        if ($this.hasClass('delete')) {
        	var html = $("#"+write).val();

        	$("#"+write).val(html.substr(0, html.length - 1));
        	return false;
        }

        if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
        if ($this.hasClass('space')) character = ' ';
        if ($this.hasClass('tab')) character = "\t";
        if ($this.hasClass('return')) character = "\n";

        if ($this.hasClass('uppercase')) character = character.toUpperCase();

        if (shift === true) {
        	$('.symbol span').toggle();
        	if (capslock === false) $('.letter').toggleClass('uppercase');

        	shift = false;
        }

//alert($write);

 // Add the character
 $("#"+write).val($("#"+write).val() + character);

});

});


jQuery.fn.center = function () {
	this.css("position","absolute");
	this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
		$(window).scrollLeft()) + "px");
	return this;
}

$("input").on("focusin",function(e){
	$("#keyboard-container").show();
	write = $(this).attr('id');
});*/


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
	var splited = window.location.hash;
    if (splited == "#map"){
    	$("#bottom_logo").hide();
    	$("#defilor-container").hide();
    }else{
    	$("#bottom_logo").show();
    	$("#defilor-container").show();
    }
}