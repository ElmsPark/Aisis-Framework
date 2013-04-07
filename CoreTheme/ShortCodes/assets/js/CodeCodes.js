function code() {

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[pre]Place Code here[/pre]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

function inlineCode() {

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[code code=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}