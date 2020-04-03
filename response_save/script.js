$( document ).ready(function() {
    $( "#new_response" ).click(function() {
    	$.ajax({
			url : '../functions.php', 
			type : 'POST', 
			data : {'action': 'get_code'},
			complete:function(data){
				document.location.href = "../answer?code="+data.responseJSON;
			}
	    });
	});

	$( "#end_survey" ).click(function() {
    	document.location.href = "../result";
	});
});