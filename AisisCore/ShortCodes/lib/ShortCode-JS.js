/**
 * The following functions are related to to
 * the short codes they will send to the editor.
 */
 
function aisisRedButton() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[red_button]Button Content[/red_button]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

} 

function aisisBlueButton() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[blue_button link="http://google.ca"]Button Content[/blue_button]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function aisisGreenButton() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[green_button]Button Content[/green_button]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}
 
function aisisPageTitle() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[aisisPageTitle]Place page Title here![/aisisPageTitle]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function softImage() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[softimg]Place Img SRC here[/softimg]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

function glossyImage() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[glossimg]Place Img SRC here[/glossimg]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}

}

function info() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[info]This is a summary or some extra info about said post[/info]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

function update() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[update]This would be an update to said post[/update]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

function youtube() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[youtube video="This is the url (eg:http://www.youtube.com/embed/EuSNbih9mAc)"]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}

function code() {
	var debug = true;
	try{
		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor('[code].example_class{}[/code]');
	}catch(e){
		console.log("Could not send to window: " + e);
	}
}
