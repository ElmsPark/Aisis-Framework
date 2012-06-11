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
	
	$('.imgPostFull img').each(function() {
		var imgClass = $(this).attr('class');
		$(this).wrap('<span class="image-wrap ' + imgClass + '" style="width: auto; height: auto;"/>');
		$(this).removeAttr('class');
	});		
	
	$(".tip").tipTip();
	
	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); 
		return false;
	});
	
	$("pre.styles").snippet("css",{style:"acid"})
	$("pre.js").snippet("javascript",{style:"acid"})
});

$(window).load(function() {
    $('.flexslider').flexslider();
  });





