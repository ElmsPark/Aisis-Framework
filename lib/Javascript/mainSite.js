/**
 * ==============[DON'T TOUCH]==============
 *
 *		This file loads all the JS thats 
 *		used on the pages to load all the
 *		custom functions.
 *
 *		You should not have to touch this 
 *      file at all. Please use the 
 *		custom-js.js file to add your own
 *		js to the page.
 *
 *		@author: Adam Balan
 *		@version: 1.0
 *
 * =========================================
 */
 
 
/**
 * creates tips and manipulates
 * any image inside the div .imgPost
 * see the short code fort his.
 *
 * There are two classes you can use:
 *
 * [glossyimg][/glossyimg]
 * [softembossed][/softembossed]
 *
 */
jQuery(document).ready(function($){

	// wrap image with <span class="image-wrap"> for styling
	$('.imgPost img').each(function() {
		var imgClass = $(this).attr('class');
		$(this).wrap('<span class="image-wrap ' + imgClass + '" style="width: auto; height: auto;"/>');
		$(this).removeAttr('class');
	});
	
	$(".tip").tipTip();
	
	$('#camera_wrap_1').camera({
		thumbnails: true
	});
	
	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); 
		return false;
	});
});

function notice_one() {
	$().toastmessage('showNoticeToast', "Welcome to the responsive Aisis - Ace-is - Web site. We hope you enjoy your stay");
}
	
function notice_two() {
	$().toastmessage('showNoticeToast', "This is a second notice. Notice how they stack?");
}
function notice_three() {
	$().toastmessage('showNoticeToast', "These notices are designed like Android notices they even fade away!");
}


