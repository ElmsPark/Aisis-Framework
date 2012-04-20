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
	 

	 $fileContents = new AisisFileHandeling();
	 $update_css = false;
	 $update_css_failed = false;
	 $update_media_css = false;
	 $update_media_css_failed = false;
	 
	 if(isset($_POST['published'])){
		 $contents = stripslashes_deep($_POST['code']);
		 if($fileContents->write_to_file($fileContents->get_file_to_write_to(CUSTOM, 'custom-css.css', "css"), $contents, CUSTOM)){
			 $update_css = true;
		 }else{
			 $update_css_failed = true;
		 }
	 }
	 
	 if(isset($_POST['published-media'])){
		 $contents = stripslashes_deep($_POST['code-media']);
		 if($fileContents->write_to_file($fileContents->get_file_to_write_to(CUSTOM, 'custom-media-query.css', "css"), $contents, CUSTOM)){
			 $update_media_css = true;
		 }else{
			 $update_media_css_failed = true;
		 }
		 
	 }
	 
	 
?>
    <div id="adminPanelWrapper">
        <div class="adminPanelTitle">
        	Aisis Core Theme Options
        </div>
        <div class="adminPanelSubTitle">
        	Aisis Core Version 1.0
        </div>
        <div class="textSection">
            Welcome to the CSS Editor. Here you can edit the custom-css.css in your custom folder. After words please hit save to save the changes you made. The same applies to the Media Query CSS editor.
        </div>
        <h1>Css Editor</h1>
        <?php 
		if($update_css == true){
			?><div class="success">We have successfully edited your custom css file. You will now see the resualts of that edit bellow.</div><?php
		}elseif($update_css_failed == true){?>
        	  <div class="err">Something went wrong and we could not update your css file. Do you have write access to this file?</div>
        <?php } ?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-css-editor') ?>>
            <div class="contents">
            	<textarea id="code" name="code"><?php echo $fileContents->get_contents('custom-css.css');?></textarea>
            </div> 
            <input type="submit" id="published" name="published" />
        </form>
        
        <h1>Css Media Query Editor</h1>
        <?php 
		if($update_media_css == true){
			?><div class="success">We have successfully edited your custom media query css file. You will now see the resualts of that edit bellow.</div><?php
		}elseif($update_media_css_failed == true){?>
        	  <div class="err">Something went wrong and we could not update your custom media query css file. Do you have write access to this file?</div>
        <?php } ?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-css-editor') ?>>
            <div class="contents">
            	<textarea id="code-media" name="code-media"><?php echo $fileContents->get_contents('custom-media-query.css');?></textarea>
            </div> 
            <input type="submit" id="published-media" name="published-media" />
        </form>
    </div>
    