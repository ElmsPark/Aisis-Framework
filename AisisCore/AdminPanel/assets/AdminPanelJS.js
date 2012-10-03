/**
	This is the core JS for the Admin Panel.
	
	@package AisisCore->AdminPanel->Assets
**/
$(document).ready(function() {
	
	var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    	lineNumbers: true,
		ineWrapping: true,
		onCursorActivity: function() {
    		editor.matchHighlight("CodeMirror-matchhighlight");
  		}
    });
});





