$(document).ready(function(){	
	var index = window.location.pathname.lastIndexOf("/") + 1;
	var filename = window.location.pathname.substr(index);

	if(filename == 'index.php' || filename == ''){
		getMsg();
	}
	

});

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
	$('#defilor')
	.bind('finished', function () {
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
		$("#defilor").marquee();
	})
	.marquee()
}