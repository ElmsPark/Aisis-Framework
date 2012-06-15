//This is added to the maijn wordpress admin page
//for use on the widgets page.
$(document).ready(function() {

	$('#shellBackground, #shellColor, #tweetsBackground, #tweetsColor, #tweetsLink').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	})
	
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});

});