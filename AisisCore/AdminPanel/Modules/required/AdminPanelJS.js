/**
	This is the core JS for the Admin Panel.
	
	@package AisisCore->AdminPanel->Template
**/
$(document).ready(function() {
	var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    	lineNumbers: true,
		ineWrapping: true
    });
	
	var editor = CodeMirror.fromTextArea(document.getElementById("code-media"), {
    	lineNumbers: true,
		lineWrapping: true
    });
	
	var editor = CodeMirror.fromTextArea(document.getElementById("php"), {
    	lineNumbers: true,
		lineWrapping: true
    });
	
	$('#upload_image_button').click(function() {
		formfield = $('#button-image-upload').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
});




