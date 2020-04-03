var valide = false;

$( document ).ready(function() {

	$("#submit").prop("disabled", true);

    $( "#submit" ).click(function() {

    	// Can redirect
    	valide = true;

    	$(".selected").each(function(){
    		// Get the id of proposal and mention
    		var id_mention = $(this).attr("id");
    		add_response(parseInt(id_mention.split("_")[0]), parseInt(id_mention.split("_")[1]));
    	})
	});

	$( ".mention" ).each(function(){
		$(this).click(function() {
			var id_card = $(this).closest('div.card').attr('id');

			// Add class selected on click
			$("div#"+id_card+" div.mention").each(function(){
				$(this).removeClass("selected");
			});
			
			$(this).addClass("selected");

			// Submit button enable if one item per card selected
			if ($('.card').length == $('.selected').length)
				$("#submit").prop("disabled", false);
			else 
				$("#submit").prop("disabled", true);
			
		})
	})
		
    	
});

function add_response(id, value){
	$.ajax({
		url : '../functions.php', 
		type : 'POST', 
		data : {'action': 'add_response', 'id':id, 'value':value},
    });
}

$(document).ajaxStop(function () {
	// If we cliked on valider and all request done, we go to another page
	if(valide){
		document.location.href = "../response_save";
	}
});