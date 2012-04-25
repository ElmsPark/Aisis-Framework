/**
	This is the core JS for the Admin Panel.
	
	@package AisisCore->AdminPanel->Template
**/
$(document).ready(function() {
	
	var formfield;
	
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
	
});




