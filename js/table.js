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

function prepareModal(trid){
	$("#modalid").val(trid.split("tr")[1]);
	$("#modalmessage").val($("#"+trid+" > td:eq(0)").html());
	var date = $("#"+trid+" > td:eq(1)").html().split(" ");
	$("#modaldate").val(date[1]);
	$("#modaldebut").val(date[3]);
	$("#modalfin").val(date[5]);
	$("#modalMessage").modal();
}

function savedata(){
	var id=$("#modalid").val();
	var msg=$("#modalmessage").val();
	var date=$("#modaldate").val();
	
	var datetab = date.split("-");
	var format = datetab[2]+"-"+datetab[1]+"-"+datetab[0];

	var debut=$("#modaldebut").val();
	var fin=$("#modalfin").val();
	var datedebut = format + " " + debut;
	var datefin = format + " " + fin;

	if(msg == null || msg =="")
		return;
	if(datedebut.indexOf("j") >= 0 || datedebut.indexOf("m") >= 0 || datedebut.indexOf("a") >= 0 || datedebut.indexOf("h") >= 0)
		return;
	if(datefin.indexOf("j") >= 0 || datefin.indexOf("m") >= 0 || datefin.indexOf("a") >= 0 || datefin.indexOf("h") >= 0)
		return;

	var scriptUrl = "updateMsg.php";

	$.ajax({
		url: scriptUrl,
		data: { mid: id, mmsg : msg,mdatedebut : datedebut, mdatefin : datefin},
		type: 'post',
		dataType: 'html',
		async: false,
		success: function(data){
			window.location.href="messagerie.php";
		}
	});
}

function prepareDelModal(id){
	$("#modaldeleteid").val(id);
	$("#modalDelete").modal();
}

function deletemessage(){
	var id=$("#modaldeleteid").val();

	var scriptUrl = "deleteMsg.php";

	$.ajax({
		url: scriptUrl,
		data: { mid: id},
		type: 'post',
		dataType: 'html',
		async: false,
		success: function(data){
			window.location.href="messagerie.php";
		}
	});
}

$('input[type="date"]').bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});