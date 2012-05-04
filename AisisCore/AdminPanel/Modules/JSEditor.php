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
	 $is_box_empty = false;
	 $is_content_the_same = false;
	 
	 $tmp_contents = $aisis_file_contents->get_contents(CUSTOM, 'custom-js.js');
	 
	 if(isset($_POST['published'])){
		 if($_POST['code'] != ''){
			 if($_POST['code'] != $tmp_contents ){
				 $text_area_contents = stripslashes_deep($_POST['code']);
				 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-js.js', "js"), $text_area_contents, CUSTOM)){
					 $did_it_update_js = true;
				 }else{
					 $did_update_js_fail = true;
				 }
			 }else{
				$is_content_the_same = true; 
			 }
		 }else
		 {
			 $text_area_contents = stripslashes_deep($_POST['code']);
			 if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-js.js', "js"), $text_area_contents, CUSTOM)){
		 	}
			$is_box_empty = true;
	   	 }
	 }
	 
	 
?>
        <div class="box">
        	<h1>JavaScript Editor</h1>
            <p>Looking to add your own custom JS? add it bellow and hit save and watch your java script functions come alive!</p>
        </div>
        <?php 
		if($did_it_update_js == true){
			?><div class="success">We have successfully edited your custom-js.js file. You will now see the resualts of that edit bellow.</div>			  
			  <script>
			  $().toastmessage('showSuccessToast', "We have saved your work to your custom-js.js file in your /Aisis/custom/ folder");
              </script><?php
		}elseif($did_update_js_fail == true){?>
        	  <div class="err">Something went wrong and we could not update your custom-js.js file. Do you have write access to this file?</div>
              <script>
			  $().toastmessage('showErrToast', "We have failed to save your work to your custom-js.js file in your /Aisis/custom/ folder");
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
    	<div class="notice">Please note that any changes you make here will over write your custom-js.js file in your custom/ folder.</div>
        <form method="post" action=<?php admin_url('admin-post.php?action=aisis-js-editor') ?>>
            <textarea id="code" name="code"><?php echo $aisis_file_contents->get_contents(CUSTOM, 'custom-js.js');?></textarea>
            <input type="submit" id="published" name="published" />
        </form>
    