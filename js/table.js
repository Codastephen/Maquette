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

function validateInputDateTime(box){
	var state = true;
	$(box+" input").each(function(i){
		if($(this).val() == null || $(this).val() =="")
			state = false;
		if($(this).val().indexOf("j") >= 0 || $(this).val().indexOf("m") >= 0 || $(this).val().indexOf("a") >= 0 || $(this).val().indexOf("h") >= 0)
			state = false;
	})
	var stt = new Date("January 1, 2001 " + $(box+" input.debut").val());
	stt = stt.getTime();
	var ett = new Date("January 1, 2001 " + $(box+" input.fin").val());
	ett = ett.getTime();
	if(stt>=ett)
		state=false;
	if(!state){
		$(box+" input").addClass("error");
		setTimeout(function(){
			$(box+" input").removeClass("error");
		},5000);
	}

	return state;

}

function HideTr(obj,id){
	if($(obj).hasClass("glyphicon-minus-sign")){
		$("#tableVisite tr").each(function(){
			if($(this).hasClass(id)){
				if(!$(this).find("td").hasClass("multiple"))
					$(this).fadeOut();
			}
			
		});
		$(obj).addClass("glyphicon-plus-sign");
		$(obj).removeClass("glyphicon-minus-sign")
	}else if($(obj).hasClass("glyphicon-plus-sign")){
		$("#tableVisite tr").each(function(){
			if($(this).hasClass(id)){
				if(!$(this).find("td").hasClass("multiple"))
					$(this).fadeIn();
			}
			
		});
		$(obj).removeClass("glyphicon-plus-sign");
		$(obj).addClass("glyphicon-minus-sign");
	}
}

function filterTableVisite(text){
	$("#tableVisite tbody tr").each(function(){
		if($(this).find("td.multiple > span").hasClass("glyphicon-plus-sign")){
			$(this).find("td.multiple > span").addClass("glyphicon-minus-sign");
			$(this).find("td.multiple > span").removeClass("glyphicon-plus-sign");
		}
		$(this).hide();
	});
	if(text=="present"){
		$("#tableVisite tbody tr").each(function(){
			if($(this).find('td.code').html()!=0)
				$(this).show();
		});
	}
	if(text=="nonpresent"){
		$("#tableVisite tbody tr").each(function(){
			if($(this).find('td.code').html()==0)
				$(this).show();
		});
	}
	if(text=="all"){
		$("#tableVisite tbody tr").each(function(){
			$(this).show();
		});
	}
}


function filterTable(text){
	$("#tableVisiteur tbody tr").each(function(){
		$(this).hide();
	});
	if(text=="present"){
		$("#tableVisiteur tbody tr").each(function(){
			if($(this).find('td.code').html()!=0)
				$(this).show();
		});
	}
	if(text=="nonpresent"){
		$("#tableVisiteur tbody tr").each(function(){
			if($(this).find('td.code').html()==0)
				$(this).show();
		});
	}
	if(text=="all"){
		$("#tableVisiteur tbody tr").each(function(){
			$(this).show();
		});
	}
}