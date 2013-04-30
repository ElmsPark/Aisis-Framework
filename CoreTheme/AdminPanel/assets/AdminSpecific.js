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
		
		var setTargetState = function (checkbox) {
		    var $this = $(checkbox);
		    var $target = $($this.attr('data-target-selector'));
		    
		    
		    if ($this.is(":checked")) {
		        $target.show();
		    } else {
		        $target.hide();
		    }
		}		

		$('.carouselGlobal').click(function () {
		    setTargetState(this);
		});

		$('.carouselGlobal').each(function(){
		    setTargetState(this);
		});	
		
		$('.add_jumbotron').click(function () {
		    setTargetState(this);
		});

		$('.add_jumbotron').each(function(){
		    setTargetState(this);
		});
		
		$('.category_header').click(function () {
		    setTargetState(this);
		});

		$('.category_header').each(function(){
		    setTargetState(this);
		});	
		
		$('.author_header').click(function () {
		    setTargetState(this);
		});

		$('.author_header').each(function(){
		    setTargetState(this);
		});
		
		$('.tag_header').click(function () {
		    setTargetState(this);
		});

		$('.tag_header').each(function(){
		    setTargetState(this);
		});		
			
		if ($('input[value=lists]:radio:checked').attr('id') === "list") {
	        $('.sectionLists').show();
	    }
	
		if ($('input[value=rows]:radio:checked').attr('id') === "row") {
	        $('.sectionRows').show();
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
})(jQuery);
