function featureDivider() {

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[featureDivider]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

function feature() {

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[feature]Content here[/feature]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

function featureHeader() {

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[featureHeader heading="" heading_text="" muted_text="" icon=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

