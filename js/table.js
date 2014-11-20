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
	$("table.tablevisitor tr").find("button").hide();
	item.find("button").show();
}
}
function resetTable(){
	$("table.tablevisitor tr").removeClass("success");
	$("table.tablevisitor tr").find("a").hide();
	$("table.tablevisitor tr").find("button").hide();
	$(".tableresize").animate({scrollTop : 0},1);
}

function showValidate(){
	$(this).next().fadeIn();
	$(this).fadeOut();
}

function savedata(idmsg,valuemsg){
	var result = null;
	var scriptUrl = "updateMsg.php";

	$.ajax({
		url: scriptUrl,
		data: { id: idmsg, value : valuemsg},
		type: 'post',
		dataType: 'html',
		async: false,
		success: function(data){
			alert('Message bien mis à jour');
		},
		error:function(data){
			alert('Erreur');
		}
	});
}
