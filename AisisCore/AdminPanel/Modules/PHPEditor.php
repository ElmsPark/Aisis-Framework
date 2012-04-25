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
	 

	 $aisis_file_contents = new AisisFileHandeling();
	 $did_it_update_php = false;
	 $did_update_php_fail = false;
	 
	 if(isset($_POST['published'])){
		 $text_area_contents = stripslashes_deep($_POST['code']);
		 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-functions.php', "php"), $text_area_contents, CUSTOM)){
			 $did_it_update_php = true;
		 }else{
			 $did_update_php_fail = true;
		 }
	 }
	 
	 
?>
        <h1>PHP Editor</h1>
        <?php 
		if($did_it_update_php == true){
			?><div class="success">We have successfully edited your custom functions.php file. You will now see the resualts of that edit bellow.</div><?php
		}elseif($did_update_php_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your custom functions.php file. Do you have write access to this file?</div>
        <?php } ?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first. 
        If you in any way make any kind of syntax error or any other error you may result in a white screen of death. 
        We advise you back up your <strong>custom/custom-functions.php</strong></div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-php-editor') ?>>
            <div class="contents">
            	<textarea id="code" name="code"><?php echo $aisis_file_contents->get_contents(CUSTOM, 'custom-functions.php');?></textarea>
            </div> 
            <input type="submit" id="published" name="published" />
        </form>
    