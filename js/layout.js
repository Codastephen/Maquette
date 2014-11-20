$(document).ready(function(){
	size();
	if($("#alertbox").is(":visible")){
		setTimeout(function(){
			$("#alertbox").fadeOut();
		}, 5000);
	}
	var $_GET = {};

	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
		function decode(s) {
			return decodeURIComponent(s.split("+").join(" "));
		}

		$_GET[decode(arguments[1])] = decode(arguments[2]);
	});
	if($_GET['helper']==0)
		$("#myModal").modal();

	repeatEvery(getMsg, 60 * 1000);
});

$(window).resize(function(){
	size();
});

function repeatEvery(func, interval) {
    // Check current time and calculate the delay until next interval
    var now = new Date,
        delay = interval - now % interval;

    function start() {
        // Execute function now...
        func();
        // ... and every interval
        setInterval(func, interval);
    }

    getMsg();
    // Delay execution until it's an even interval
    setTimeout(start, delay);
}



function size(){
	$(".wrapper-img").css("height",Math.ceil($(window).height()/4));
	$(".wrapper-img-admin").css("height",Math.ceil($(window).height()/2));
	$(".top").css("height",Math.ceil($(window).height()/4));
	$(".tableresize").css("height",$(window).height()-(120 + parseInt($('#rowlogo').css('margin-top'), 10) + $('#rowlogo').outerHeight()));
}

function getMsg()
{
	var result = null;
	var scriptUrl = "getMsg.php";
	$.ajax({
		url: scriptUrl,
		type: 'get',
		dataType: 'html',
		async: false,
		success: function(data) {
			result = data;
		} 
	});
	$("#defilor").html(result);
	$("#defilor").click();
}