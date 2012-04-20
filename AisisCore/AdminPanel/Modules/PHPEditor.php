<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This file is the PHP editor for Aisis in which it will
	 *		load in the custom/custom-functions.php file and allow you
	 *		to edit the file. If it is not there you will get an
	 *		error message telling you to create one.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 * =================================================================
	 */
	 

	 $fileContents = new AisisFileHandeling();
	 $update_php = false;
	 $update_php_failed = false;
	 
	 if(isset($_POST['published'])){
		 $contents = stripslashes_deep($_POST['code']);
		 if($fileContents->write_to_file($fileContents->get_file_to_write_to(CUSTOM, 'custom-functions.php', "php"), $contents, CUSTOM)){
			 $update_php = true;
		 }else{
			 $update_php_failed = true;
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
        <h1>PHP Editor</h1>
        <?php 
		if($update_php == true){
			?><div class="success">We have successfully edited your custom functions.php file. You will now see the resualts of that edit bellow.</div><?php
		}elseif($update_php_failed == true){?>
        	  <div class="err">Something went wrong and we could not update your custom functions.php file. Do you have write access to this file?</div>
        <?php } ?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first. 
        If you in any way make any kind of syntax error or any other error you may result in a white screen of death. 
        We advise you back up your <strong>custom/custom-functions.php</strong></div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-php-editor') ?>>
            <div class="contents">
            	<textarea id="code" name="code"><?php echo $fileContents->get_contents('custom-functions.php');?></textarea>
            </div> 
            <input type="submit" id="published" name="published" />
        </form>
    </div>
    