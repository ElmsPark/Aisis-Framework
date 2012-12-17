function jumbotron() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[jumbotron]Place your content here.[/jumbotron]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

} 

function marketingTitle() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[marketingTitle]Whats the Title?[/marketingTitle]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

} 

function marketingLead() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[marketingLead]lead Content.[/marketingLead]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function button() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[button size="" color="" link=""]place title here[/button]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}