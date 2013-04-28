function containerNarrow() {
	
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[container-narrow]Place your content here.[/container-narrow]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

} 