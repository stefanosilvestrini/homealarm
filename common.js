jQuery(document).ready(function($) {
	
	onOffAlarm();

	var old_stato = window.location.search.replace("?old_stato=", "");
	var attuale_stato = $('#attuale_stato').val();

	if(old_stato != '') {

		if(old_stato == attuale_stato) {

			$('#res').html('<img src="ajax-loader.gif"><br /><br />Attendere la conferma...');

			setTimeout(function(){ 

				window.location = '?old_stato='+old_stato;

			}, 3000);

		} else window.location = '/alarm/';

	}

});

function onOffAlarm() {

	$("body").on('click', '#onoff', function() {

		var old_stato = $('#old_stato').val();
		
		if($(this).is(':checked')) var set_alarm = 'inserito';
		else var set_alarm = 'disinserito'

		$('#res').html('<img src="ajax-loader.gif"><br /><br />Attendere la conferma...');


		$.ajax({
	        url: 'setalarm.php',
	        type: 'POST',
	        data: { set_alarm:set_alarm },
	        success: function(data_result) { 
	                        
	        }

	    });

		setTimeout(function(){ 

			window.location = '?old_stato='+old_stato;

		}, 3000);

	});

    return false;

}

