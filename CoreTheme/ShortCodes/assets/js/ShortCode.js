
function button() {

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[button size="" color="" link="" title=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function toc() {

	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[toc css_container="" css_prop=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

