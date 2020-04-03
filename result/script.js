$( document ).ready(function() {
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	
	
});

function two_chars_number(number){
		if (number<10)
			return '0'+number;
		else
			return ''+number;
	}