var valide = false;
var amount_proposals = 2;

$( document ).ready(function() {

	$.ajax({
		url : '../functions.php', 
		type : 'POST', 
		data : {'action': 'new_survey'}
    });
	
	// On click on submit, we get all inputs values
    $( "#submit_button" ).click(function() {
  		
  		// First we check if all is filled
  		var can_validate = true;
  		$("input").each(function(){
  			$(this).removeClass("is-invalid");
  			if ($(this).val()==''){
  				$(this).addClass("is-invalid");
  				can_validate = false;
  			}
  			if (amount_proposals<2){
  				can_validate = false;
  				$("#too_few_proposals").show();
  			}else{
  				$("#too_few_proposals").hide();
  			}
		})

  		// Then if it's ok we had it to database
  		if (can_validate){
  			$("input").each(function(){
	  			add_proposal($(this).val()); 
			})
  			valide = true;
  		}

	})

    // On click on plus, add input text
	$("#add_input_text").click(function(){
		amount_proposals++;
		input = jQuery('<div class="d-flex flex-row justify-content-start mb-4 item_proposal">'+
							'<div class="d-flex flex-column justify-content-center">'+
		                        '<span class="badge badge-primary"><h3 class="title m-0 number_proposal">'+two_chars_number(amount_proposals)+'</h3></span>'+
		                    '</div>'+
		                    '<div class="flex-grow-1 pl-4 pr-4">'+
		                        '<input type="text" class="form-control" maxlength="150" placeholder="Proposition ...">'+
		                        '<div class="invalid-feedback">Veuillez entrer une proposition</div>'+
		                    '</div>'+
		                    '<div class="d-flex flex-column justify-content-center">'+
		                        '<button type="button" class="btn btn-outline-danger btnRemoveChoice"><i class="fa fa-trash"></i></button>'+
		                    '</div>'+
		                '</div>');
		jQuery('#proposals').append(input);
		click_delete_listener();
	})

	// When click on delete item
	click_delete_listener();
	})

$(document).ajaxStop(function () {
	// If we cliked on valider and all request done, we go to another page
	if(valide){
		document.location.href = "../code";
	}
});

function click_delete_listener (){
	$(".btnRemoveChoice").click(function(){
		$(this).closest("div.item_proposal").remove();
		amount_proposals = 0;
		$(".number_proposal").each(function(){
			amount_proposals++;
			$(this).html(two_chars_number(amount_proposals));
		})
	})
}

function add_proposal(value){
	$.ajax({
		url : '../functions.php', 
		type : 'POST', 
		data : {'action': 'add_proposal', 'value':value},
		complete: function(data){
			console.log(data);
		}
    });
}

function two_chars_number(number){
	if (number<10)
		return '0'+number;
	else
		return ''+number;
}