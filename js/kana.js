var testsTaken = 0;
var testsSuccess = 0;

var popoverVisible = false;
var clickedAway = false;

$(document).ready(function() {
	$("#helpKanji").popover({
		html: true,
	}).click(function(e) {
		$(this).popover("show");
		popoverVisible = true;
		clickedAway = false;
		e.preventDefault();
	});
	getRandomKanji();
});

$(document).click(function(e) {
	if(popoverVisible & clickedAway)
	{
		popoverVisible = clickedaway = false;
		$("#helpKanji").popover("hide");
	}
	else
	{
		clickedAway = true;
	}
});

$(".kanji-input #appendedInputButtons").click(function() {
	$(this).val('');
});

$(".kanji-input #appendedInputButtons").keydown(function(e) {
	if(e.keyCode == 13)
	{
		checkKanji();
		
	}
});

$("#checkKanji").click(function(){
	checkKanji();	
});

var slideDownInfo = function() {
	$(".hiddenInfo").slideDown();
};

var updateScore = function() {
	$(".score").html("Score: "+testsSuccess+"/"+testsTaken+" "+Math.round((testsSuccess/testsTaken).toFixed(2)*100)+"%");
};

var getRandomKanji = function() {
$.ajax({
	url: "/kanadojo/?ajax",
	data: {
		ajax: "getRandomKanji"
	},
	type: "GET",
	dataType: "json",
	success: function(json) {
		$(".kanji").html(json.kanji);
		$("#kanjiKey").attr("value", json.key);
		$("#helpKanji").attr("data-content", "<div style=\"text-align:center;font-weight:bold;font-size:20px;\">"+json.romanji+"</div>");
	},
	error: function(xhr, status) {
		//alert("fail1");
	},
	complete: function(xhr, status) {

	}
})};

var checkKanji = function() {
$.ajax({
	url: "/kanadojo/?ajax",
	data: {
		ajax: "checkKanji",
		romanji: $(".kanji-input #appendedInputButtons").val(),
		kanji: $("#kanjiKey").val()
	},
	type: "POST",
	dataType: "text",
	beforeSend: function(xhr){
		$("#checkKanji").addClass("disabled");
	},
	success: function(text) {
		++testsTaken;
		if (text == true)
		{
			$("#result").removeClass("alert-error");
			$("#result").addClass("alert-success");
			$("#result strong").text("Correct!");
			testsSuccess++;
		}
		else
		{
			$("#result").removeClass("alert-success");
			$("#result").addClass("alert-error");
			$("#result strong").text("Wrong!");
		}
		$(".kanji-input #appendedInputButtons").val('');
		updateScore();
		getRandomKanji();
		slideDownInfo();
	},
	error: function(xhr, status) {
		//alert("fail2");
	},
	complete: function(xhr, status) {
		$("#checkKanji").removeClass("disabled");
	}
})};
