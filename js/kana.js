var getRandomKana = function() {
$.ajax({
	url: "/kanadojo/helpers/ajax.php",
	data: {
		ajax: "getRandomKana"
	},
	type: "GET",
	dataType: "text",
	success: function(text) {
		$(".kana").html(text);
	},
	error: function(xhr, status) {
		alert("fail");
	},
	complete: function(xhr, status) {

	}
}
$(document).ready(getRandomKana());
});
