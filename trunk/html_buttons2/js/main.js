$(document).ready(function() {
	$('form a.submit_form').live('click', function(){        
 		$(this).parent('form').submit();
		return false;
	});

	$('input[type=submit].button').each(function(){
		$(this).after('<a href="" class="button submit_form">' + $(this).val() + '</a>');		
		$(this).remove();
	});
});
