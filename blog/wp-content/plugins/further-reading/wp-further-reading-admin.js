jQuery.noConflict();
jQuery(document).ready(function($) {
	$('#wpfr-behaviour-options')
		.find('input, textarea, button, select')
		.prop('disabled', $('#wpfr-defaultbahaviour-checkbox').is(':checked'));	
	$('#wpfr-behaviour-select').on('change', function loadBehaviourOptionsForm() {
		$('#wpfr-behaviour-options').empty();
		$.ajax({
			type: 'POST',
			url: WpfrAjax.ajaxUrl,
			data: { 
				action: 'wpfr_get_options_form',
				isDefaultBehaviour: $('#wpfr-defaultbahaviour-checkbox').is(':checked'),
				behaviour: $('#wpfr-behaviour-select').val(),
				postId: $('input[name=wpfr-post-id]').val()
			},
			success: function(result) {
				$('#wpfr-behaviour-options').html(result);
				$('#wpfr-behaviour-options')
					.find('input, textarea, button, select')
					.prop('disabled', $('#wpfr-defaultbahaviour-checkbox').is(':checked'));
				
			}
		});
	});
	$('#wpfr-defaultbahaviour-checkbox').on('change', function resetToDefaultBehaviour() {
		var behaviourSelect = $('#wpfr-behaviour-select');
		behaviourSelect.prop('disabled', this.checked);
		if (this.checked) {
			behaviourSelect.val($('#wpfr-default-bahaviour').val());
		}
		behaviourSelect.change();
	});
});

