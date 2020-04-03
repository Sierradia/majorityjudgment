$( document ).ready(function() {
    $( "#new_survey_button" ).click(function() {
  		document.location.href = "new";
	});

    // Check if code exists and active, if not check if exists and redirect on results page
	$( "#join" ).click(function() {
		var code = $("#join_code").val();
		if (code==""){
			$("#join_code").addClass("is-invalid");
		}else{
			$.ajax({
				url : 'functions.php', 
				type : 'POST', 
				data : {'action': 'is_code_valid', 'code':code},
				complete:function(data){
					if (data.responseJSON){
						document.location.href = "answer?code="+code;
					}else{
						$.ajax({
							url : 'functions.php', 
							type : 'POST', 
							data : {'action': 'is_code_exists', 'code':code},
							complete:function(data){
								if (data.responseJSON){
									document.location.href = "result";
								}else{
									$("#join_code").addClass("is-invalid");
								}
							}
					    });
					}
				}
		    });
		}	
  		
	});
});