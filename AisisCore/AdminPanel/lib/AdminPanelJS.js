/**
	This is the core JS for the Admin Panel.
	
	@package AisisCore->AdminPanel->Modules->Required
**/
$(document).ready(function() {
	
	var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    	lineNumbers: true,
		ineWrapping: true
    });
	
	var editor = CodeMirror.fromTextArea(document.getElementById("php"), {
    	lineNumbers: true,
		lineWrapping: true
    });
});




