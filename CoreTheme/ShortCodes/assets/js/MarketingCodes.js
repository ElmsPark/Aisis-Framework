function jumbotron() {
	
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[jumbotron]Place your content here.[/jumbotron]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

} 

function marketingTitle() {
	
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[marketingTitle]Whats the Title?[/marketingTitle]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

} 

function marketingLead() {
	
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[marketingLead]lead Content.[/marketingLead]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function marketingRow() {
	
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[row]Collumns should go here..[/row]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function marketingCollumnOne() {
	
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[collumnOne]Content Goes here.[/collumnOne]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function marketingCollumnTwo() {
	
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[collumnTwo]Content Goes here.[/collumnTwo]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}