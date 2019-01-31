$(document).ready(function(){
	$("#searchScript").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#wordsTable tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
});
