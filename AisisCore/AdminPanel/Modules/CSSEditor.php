<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This file is the Css editor for Aisis in which it will
	 *		load in the custom/custom-css.css file and allow you
	 *		to edit the file. If it is not there you will get an
	 *		error message telling you to create one.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 * =================================================================
	 */
	 
	$aisis_file_contents = new AisisFileHandeling();
	
	 $did_it_update_css = false;
	 $did_update_css_fail = false;
	 $did_it_update_media_css = false;
	 $did_update_media_css_fail = false;
	 $is_content_the_same = false;
	 $is_box_empty = false;
	 $is_media_content_the_same = false;
	 $is_media_box_empty = false;
	 
	  $tmp_contents_css = $aisis_file_contents->get_contents(CUSTOM, 'custom-css.css');
	  $temp_contents_media_css = $aisis_file_contents->get_contents(CUSTOM, 'custom-media-query.css');
	 
	 if(isset($_POST['published'])){
		 if($_POST['code'] != ''){
			 if($_POST['code'] != $tmp_contents_css ){
				 $text_area_contents = stripslashes_deep($_POST['code']);
				 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $text_area_contents, CUSTOM)){
					 $did_it_update_css = true;
				 }else{
					 $did_update_css_fail = true;
				 }
			 }else{
				$is_content_the_same = true; 
			 }
		 }else
		 {
			 $text_area_contents = stripslashes_deep($_POST['code']);
			 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $text_area_contents, CUSTOM)){
			 $is_box_empty = true;
		 	}
	   	 }
	 }
	 
	 if(isset($_POST['published-media'])){
		 if($_POST['code-media'] != ''){
			 if($_POST['code-media'] != $temp_contents_media_css ){
				 $text_area_contents = stripslashes_deep($_POST['code-media']);
				 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-media-query.css', "css"), $text_area_contents, CUSTOM)){
					 $did_it_update_media_css = true;
				 }else{
					 $did_update_media_css_fail = true;
				 }
			 }else{
				$is_media_content_the_same = true; 
			 }
		 }else
		 {
			 $text_area_contents = stripslashes_deep($_POST['code-media']);
			 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-media-query.css', "css"), $text_area_contents, CUSTOM)){
			 $is_media_box_empty = true;
		 	}
	   	 }
	 }
	 
	 
?>
        <div class="box clearFix">
        	<h1>Css Editor</h1>
            <p>Looking to edit your custom-css.css file? Make your changes bellow and hit submit. Whats saved here will change the look of your theme.</p>
        </div>
        <?php 
		if($did_it_update_css == true){
			?>
            <div class="success">We have successfully edited your custom-css.css file. You will now see the resualts of that edit bellow.</div>			  
			  <script>
			  $().toastmessage('showSuccessToast', "We have saved your work to your custom-css.css file in your /Aisis/custom/ folder");
              </script><?php
		}elseif($did_update_css_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your custom-css.css file. Do you have write access to this file?</div>
              <script>
			  $().toastmessage('showErrToast', "We have failed to save your work to your custom-css.css file in your /Aisis/custom/ folder");
              </script>
        <?php 
		}elseif($is_box_empty == true){?>
        	 <div class="noticeSave">We saved your file, but please note that it's empty...</div>
              <script>
			  $().toastmessage('showWarningToast', "We saved your file. How ever it was empty... - File saved to /Aisis/custom");
              </script>
        <?php
		}elseif($is_content_the_same == true){?>
              <div class="noticeSave">You didnt make any changes. We did not save your file. Why over write whats already there?</div>
              <script>
			  $().toastmessage('showWarningToast', "We didn't bother to save your file cause you made no changes...");
              </script>
        <?php
		}?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-css-editor') ?>>
        	<?php do_settings_fields('aisis-css-editor', 'aisis_css_editor_section'); ?>
            <input type="submit" id="published" name="published" value="Save CSS"/>
        </form>
        <div class="box">
        	<h1>Media Query Editor</h1>
            <p>Looking to edit your custom-media-query.css file? Make your changes bellow and hit submit. Whats saved here will change the look of your theme.</p>
        </div>
        <?php 
		if($did_it_update_media_css == true){
			?><div class="success">We have successfully edited your custom-media-query.css file. You will now see the resualts of that edit bellow.</div>			  
			  <script>
			  $().toastmessage('showSuccessToast', "We have saved your work to your custom-media-query.css file in your /Aisis/custom/ folder");
              </script><?php
		}elseif($did_update_media_css_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your custom-media-query.css file. Do you have write access to this file?</div>
              <script>
			  $().toastmessage('showErrToast', "We have failed to save your work to your custom-media-query.css file in your /Aisis/custom/ folder");
              </script>
        <?php 
		}elseif($is_media_box_empty == true){?>
        	 <div class="noticeSave">We saved your file, but please note that it's empty...</div>
              <script>
			  $().toastmessage('showWarningToast', "We saved your file. How ever it was empty... - File saved to /Aisis/custom");
              </script>
        <?php
		}elseif($is_media_content_the_same == true){?>
              <div class="noticeSave">You didnt make any changes. We did not save your file. Why over write whats already there?</div>
              <script>
			  $().toastmessage('showWarningToast', "We didn't bother to save your file cause you made no changes...");
              </script>
        <?php
		}?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-css-editor') ?>>
        	<?php do_settings_fields('aisis-css-editor', 'aisis_css_media_queary_editor_section'); ?>
            <input type="submit" id="published-media" name="published-media" value="Save Media Query" />
        </form>
  