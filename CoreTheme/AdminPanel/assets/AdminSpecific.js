/**
 * This file contains all Java script used on the options page.
 */
(function($){	
	$(document).ready(function(){
		$('.posts').click(function(){
			if ($(this).attr("id") == "list"){
		   		$('.sectionLists').show();
		    } else {
		    	$('.sectionLists').hide();
		    }
		});
		
		$('.posts').click(function(){
			if ($(this).attr("id") == "row"){
		   		$('.sectionRows').show();
		    } else {
		    	$('.sectionRows').hide();
		    }
		});	
		
		$('.posts').click(function(){
			if ($(this).attr("id") == "row"){
		   		$('.sectionRows').show();
		    } else {
		    	$('.sectionRows').hide();
		    }
		});	
		
		$('.category_header').click(function(){
			if ($(this).attr("id") == "category"){
		   		$('.sectionCategory').show();
		    } else {
		    	$('.sectionCategory').hide();
		    }
		});	
		
		$('.author_posts').click(function(){
			if ($(this).attr("id") == "author"){
		   		$('.sectionAuthor').show();
		    } else {
		    	$('.sectionAuthor').hide();
		    }
		});
		
		$('.tag_header').click(function(){
			if ($(this).attr("id") == "tag"){
		   		$('.sectionTag').show();
		    } else {
		    	$('.sectionTag').hide();
		    }
		});
		
		$('.carouselGlobal').click(function(){
			if ($(this).attr("id") == "carousel"){
		   		$('.sectionCarousel').show();
		    } else {
		    	$('.sectionCarousel').hide();
		    }
		});	
		
		$('.add_jumbotron').click(function(){
			if ($(this).attr("id") == "jumbotron"){
		   		$('.sectionJumbotron').show();
		    } else {
		    	$('.sectionJumbotron').hide();
		    }
		});	 							
			
		if ($('input[value=lists]:radio:checked').attr('id') === "list") {
	        $('.sectionLists').show();
	    }
	
		if ($('input[value=rows]:radio:checked').attr('id') === "row") {
	        $('.sectionRows').show();
	    }	
	    
	    if ($('input[value=category_header]:checkbox:checked').attr('id') === "category") {
	        $('.sectionCategory').show();
	    }
	     
	    if ($('input[value=author_posts]:checkbox:checked').attr('id') === "author") {
	        $('.sectionAuthor').show();
	    } 
	    
	    if ($('input[value=tag_header]:checkbox:checked').attr('id') === "tag") {
	        $('.sectionTag').show();
	    } 
	    
	    if ($('input[value=carousel_global]:checkbox:checked').attr('id') === "carousel") {
	        $('.sectionCarousel').show();
	    } 
	    
	    if ($('input[value=jumbotron]:checkbox:checked').attr('id') === "jumbotron") {
	        $('.sectionJumbotron').show();
	    }   
	    
		$("#jumbotron").change(function() {
		    if (this.checked) {
		        $("#socialbar").prop("disabled", false);
		    }
		    else {
		        $("#socialbar").prop("disabled", true);
		    }
		});             
	    
	    $("#displayLists").popover({ html : true });
		$("#morePostsList").popover({ html : true });
		$('#displayRows').popover({ html : true });
		$("#displayMoreRows").popover({ html : true });
		$("#regularPosts").popover({ html : true });
		$("#categoryHeader").popover({ html : true });
	    $("#authorPosts").popover({ html : true });
		$("#tagHeader").popover({ html : true });
	    $("#carouselGlobal").popover({ html : true });
		$("#jumbotronPop").popover({ html : true });
		$("#socialbarPop").popover({ html : true });
		$("#miniFeedGlobalPop").popover({ html : true });
		$("#imagePop").popover({ html : true });
		$("#twitterPopup").popover({ html : true });
		
		enableCarousel();
		$('#carousel').click(enableCarousel);
		enableMini();
		$('#miniFeedGlobal').click(enableMini);		
		
		$('#jumboImageButton').click(function() {
			formfield = jQuery('#jumboImage').attr('name');
			tb_show('', 'media-upload.php?type=image&TB_iframe=true');
			return false;
		});
	
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#jumboImage').val(imgurl);
			tb_remove();
		}
	});
})(jQuery);

	function enableCarousel(){
		if(this.checked){
			$('input.carousel').attr("disabled", true);
		}
	}
	
	function enableMini(){
		if(this.checked){
			$('input.mini').attr("disabled", true);
		}
	}