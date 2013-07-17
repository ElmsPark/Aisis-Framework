function hideTitle() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[hide_title title_class=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}


