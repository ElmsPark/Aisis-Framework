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

function marketingRow() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[row]Collumns should go here..[/row]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function marketingCollumnOne() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[collumnOne]Content Goes here.[/collumnOne]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function marketingCollumnTwo() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[collumnTwo]Content Goes here.[/collumnTwo]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function image() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[image width="" height="" caption=""]Image link[/image]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}
function image_circle() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[image-circle width="" height=""]Image link[/image-circle]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}
function image_rounded() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[image-rounded width="" height=""]Image link[/image-rounded]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}
function image_polaroid() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[image-polaroid width="" height=""]Image link[/image-polaroid]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function code() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[code]Place Code here[/code]');
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

function toc() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[toc css_container="" css_prop=""]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}