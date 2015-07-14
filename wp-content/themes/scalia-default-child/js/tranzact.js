var $ = jQuery
$(document).ready(function() {
	$('#tranzact_panel .drawer').click(function() {
		if ($('#tranzact_panel').hasClass('open')) {
				$('#tranzact_panel').removeClass('open');
		} else {
			$('#tranzact_panel').addClass('open');
		}
		

	});


});