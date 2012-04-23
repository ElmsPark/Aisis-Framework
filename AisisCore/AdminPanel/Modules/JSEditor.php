<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This file is the Js editor for Aisis in which it will
	 *		load in the custom/custom-js.js file and allow you
	 *		to edit the file. If it is not there you will get an
	 *		error message telling you to create one.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 * =================================================================
	 */
	 

	 $aisis_file_contents = new AisisFileHandeling();
	 $did_it_update_js = false;
	 $did_update_js_fail = false;
	 
	 if(isset($_POST['published'])){
		 $contents = stripslashes_deep($_POST['code']);
		 if($aisis_file_contents->write_to_file($aisis_file_contents->get_file_to_write_to(CUSTOM, 'custom-js.js', "js"), $contents, CUSTOM)){
			 $did_it_update_js = true;
		 }else{
			 $did_update_js_fail = true;
		 }
	 }
	 
	 
?>
        <h1>JS Editor</h1>
        <?php 
		if($did_it_update_js == true){
			?><div class="success">We have successfully edited your custom JS file. You will now see the resualts of that edit bellow.</div><?php
		}elseif($did_update_js_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your custom JS file. Do you have write access to this file?</div>
        <?php } ?>
    	<div class="notice">Please note that any changes you make here will over write your custom-js.js file in your custom/ folder.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-js-editor') ?>>
            <div class="contents">
            	<textarea id="code" name="code"><?php echo $aisis_file_contents->get_contents(CUSTOM, 'custom-js.js');?></textarea>
            </div> 
            <input type="submit" id="published" name="published" />
        </form>
    