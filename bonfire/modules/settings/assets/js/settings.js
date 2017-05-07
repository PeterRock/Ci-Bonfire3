$(document).ready(function(){
	$('#allow_name_change').on('change', function(){
		if ($('#allow_name_change').is(':checked')) {
			$('#name-change-settings').css('display', 'block');
		} else {
			$('#name-change-settings').css('display', 'none');
		}
	});

	$('#allow_remember').on('change', function(){
		if ($('#allow_remember').is(':checked')) {
			$('#remember-length').css('display', 'block');
		} else {
			$('#remember-length').css('display', 'none');
		}
	});

    $('#status').on('change', function() {
        if (0 == $('#status').val()) {
            $('#offline_reason').parents('.form-group').css('display', 'block');
        } else {
            $('#offline_reason').parents('.form-group').css('display', 'none');
        }
    });
});