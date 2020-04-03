$( document ).ready(function() {
    $( "#end" ).click(function() {
    	var code = $("#end_code").val();
    	if (code==""){
			$("#join_code").addClass("is-invalid");
		}else{
	    	$.ajax({
				url : '../functions.php', 
				type : 'POST', 
				data : {'action': 'save_code', 'code':code},
				complete:function(data){
					document.location.href = "../result";
				}
		    });
	    }
	});
});