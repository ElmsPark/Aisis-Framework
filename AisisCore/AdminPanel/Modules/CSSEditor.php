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
	 
	 if(isset($_POST['published'])){
		 $aisis_css_contents = stripslashes_deep($_POST['code']);
		 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $aisis_css_contents, CUSTOM)){
			 $did_it_update_css = true;
		 }else{
			 $did_update_css_fail = true;
		 }
	 }
	 
	 if(isset($_POST['published-media'])){
		 $aisis_css_media_contents = stripslashes_deep($_POST['code-media']);
		 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-media-query.css', "css"), $aisis_css_media_contents, CUSTOM)){
			 $did_it_update_media_css = true;
		 }else{
			 $did_update_media_css_fail = true;
		 }
		 
	 }
	 
	 
?>
        <h1>Css Editor</h1>
        <?php 
		if($did_it_update_css == true){
			?><div class="success">We have successfully edited your custom css file. You will now see the resualts of that edit bellow.</div><?php
		}elseif($did_update_css_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your css file. Do you have write access to this file?</div>
        <?php } ?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-css-editor') ?>>
            <div class="contents">
            	<textarea id="code" name="code"><?php echo $aisis_file_contents->get_contents(CUSTOM, 'custom-css.css');?></textarea>
            </div> 
            <input type="submit" id="published" name="published" />
        </form>
        
        <h1>Css Media Query Editor</h1>
        <?php 
		if($did_it_update_media_css == true){
			?><div class="success">We have successfully edited your custom media query css file. You will now see the resualts of that edit bellow.</div><?php
		}elseif($did_update_media_css_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your custom media query css file. Do you have write access to this file?</div>
        <?php } ?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-css-editor') ?>>
            <div class="contents">
            	<textarea id="code-media" name="code-media"><?php echo $aisis_file_contents->get_contents(CUSTOM, 'custom-media-query.css');?></textarea>
            </div> 
            <input type="submit" id="published-media" name="published-media" />
        </form>