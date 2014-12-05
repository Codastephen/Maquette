$(document).ready(function(){	
	var index = window.location.pathname.lastIndexOf("/") + 1;
	var filename = window.location.pathname.substr(index);

	if(filename == 'index.php'){
		repeatEvery(getMsg, 60 * 1000);
	}
	

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
	$('#defilor').marquee();
}