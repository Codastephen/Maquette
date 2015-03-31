$(document).ready(function(){
	var width = $(window).width() - $("#myTab").width();
	var keyboard_text_width = $("#keyboard_text").width();
	var keyboard_number_width = $("#keyboard_number").width();
	var keyboard_text_right = width/2 - keyboard_text_width /2 ;
	var keyboard_number_right = width/2 - keyboard_number_width /2 ;
	$("#keyboard_text").css("right",keyboard_text_right);
	$("#keyboard_number").css("right",keyboard_number_right);
})

id_input = $("societe");
keyboard_type = "text"

$("input.borne").click(function(e){
	e.stopPropagation();
	id_input = $(this);
	keyboard_type=$(this).attr('type');
	if(keyboard_type == "password")
		keyboard_type = "text";
	$("#keyboard_text").hide();
	$("#keyboard_number").hide();
	if(keyboard_type == "text" || keyboard_type == "password" )
		$("#keyboard_text").show();
	else if(keyboard_type == "number")
		$("#keyboard_number").show();
});

$(document).click(function(){
	$("#keyboard_number").hide();
	$("#keyboard_text").hide();
})

$('#keyboard_text li').on('touchstart',function(){
	$(this).addClass('active');
})

$('#keyboard_text li').on('touchend',function(){
	$(this).removeClass('active');
})

$('#keyboard_number li').on('touchstart',function(){
	$(this).addClass('active');
})

$('#keyboard_number li').on('touchend',function(){
	$(this).removeClass('active');
})

$("#keyboard_number").click(function(e){
	e.stopPropagation();
})

$("#keyboard_text").click(function(e){
	e.stopPropagation();
})

$('#keyboard_text li').click(function(){
	var $this = $(this),
    character = $this.html(); // If it's a lowercase letter, nothing happens to this variable

    if ($this.hasClass('delete')) {
    	var html = id_input.val();

    	id_input.val(html.substr(0, html.length - 1));
    	return false;
    }
    if(id_input.attr("maxlength") == id_input.val().length)
		return;
    if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
    if ($this.hasClass('space')) character = ' ';
    id_input.val(id_input.val() + character);
});

$('#keyboard_number li').click(function(){
	var $this = $(this),
    character = $this.html(); // If it's a lowercase letter, nothing happens to this variable

    if ($this.hasClass('delete')) {
    	var html = id_input.val();

    	id_input.val(html.substr(0, html.length - 1));
    	return false;
    }
    if(id_input.attr("maxlength") == id_input.val().length)
		return;
    if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
    if ($this.hasClass('space')) character = ' ';
    id_input.val(id_input.val() + character);
});
