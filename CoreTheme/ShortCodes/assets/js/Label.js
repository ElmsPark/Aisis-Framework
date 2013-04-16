function label(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[label label=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function labelWarning(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[labelWarning label=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function labelError(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[labelError label=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function labelSuccess(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[labelSuccess label=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function labelInfo(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[labelInfo label=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}