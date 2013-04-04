function imageCircle() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[image-circle width="" height="" align="" img_link=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function imageRounded() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[image-rounded width="" height="" align="" img_link=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function imagePolaroid() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[image-polaroid width="" height="" align="" img_link=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}