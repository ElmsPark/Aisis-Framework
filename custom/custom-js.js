/**
 * This is your custom JS file in which you can call
 * all your java script here for your page.
 */
 
//Set up your custom on document load section.

jQuery(document).ready(function($){
	//add your custom jquery jazz here
});

//these are example functions for the default dashboard
function notice_one() {
	$().toastmessage('showNoticeToast', "Welcome to the responsive Aisis - Ace-is - Web site. We hope you enjoy your stay");
}
	
function notice_two() {
	$().toastmessage('showNoticeToast', "This is a second notice. Notice how they stack?");
}
function notice_three() {
	$().toastmessage('showNoticeToast', "These notices are designed like Android notices they even fade away!");
}
