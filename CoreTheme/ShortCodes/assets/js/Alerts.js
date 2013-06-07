function info(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[info]content[/info]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function warning(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[warning]content[/warning]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function error(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[error]content[/error]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function note(){

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[note]content[/note]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}