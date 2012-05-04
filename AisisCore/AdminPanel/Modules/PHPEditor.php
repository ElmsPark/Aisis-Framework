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
	 $is_box_empty = false;
	 $is_content_the_same = false;
	 
	 $tmp_contents = $aisis_file_contents->get_contents(CUSTOM, 'custom-functions.php');
	 
	 if(isset($_POST['published'])){
		 if($_POST['code'] != ''){
			 if($_POST['code'] != $tmp_contents ){
				 $text_area_contents = stripslashes_deep($_POST['code']);
				 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-functions.php', "php"), $text_area_contents, CUSTOM)){
					 $did_it_update_php = true;
				 }else{
					 $did_update_php_fail = true;
				 }
			 }else{
				$is_content_the_same = true; 
			 }
		 }else
		 {
			 $text_area_contents = stripslashes_deep($_POST['code']);
			 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-functions.php', "php"), $text_area_contents, CUSTOM)){
			 $is_box_empty = true;
		 	}
	   	 }
	 }
	 
?>
        <div class="box">
        	<h1>PHP Editor</h1>
            <p>Looking to edit your custom-functions.php file? Make your changes bellow and hit the save button to see the changes take affect.</p>
        </div>
        <?php 
		if($did_it_update_php == true){
			?><div class="success">We have successfully edited your custom-functions.php file. You will now see the resualts of that edit bellow.</div>			  
			  <script>
			  $().toastmessage('showSuccessToast', "We have saved your work to your custom-functions.php file in your /Aisis/custom/ folder");
              </script><?php
		}elseif($did_update_php_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your custom-functions.php file. Do you have write access to this file?</div>
              <script>
			  $().toastmessage('showErrToast', "We have failed to save your work to your custom-functions.php file in your /Aisis/custom/ folder");
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
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first. 
        If you in any way make any kind of syntax error or any other error you may result in a white screen of death. 
        We advise you back up your <strong>custom/custom-functions.php</strong></div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-php-editor') ?>>
            <textarea id="code" name="code"><?php echo $aisis_file_contents->get_contents(CUSTOM, 'custom-functions.php');?></textarea> 
            <input type="submit" id="published" name="published" />
        </form>