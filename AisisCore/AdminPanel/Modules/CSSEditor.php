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
	 
?>
        <div class="box clearFix">
        	<h1>Css Editor</h1>
            <p>Looking to edit your custom-css.css file? Make your changes bellow and hit submit. Whats saved here will change the look of your theme.</p>
        </div>
        <?php
		if(get_option('did_we_write_to_the_file') == 'true'){
			?>
			<div class="success">We have successfully updated your custom-css.css file in your custom folder.</div>
            <script>
            	$().toastmessage('showSuccessToast', "We have successfully updated your custom-css.css file in your custom folder. Check out your site to see the new changes.");
            </script>
			<?php
			update_option('did_we_write_to_the_file', '');
		}
		
		if(get_option('did_it_fail_to_update') == 'true'){
			?>
			<div class="err">Either you tried to save an empty custom-css.css file or your custom-css.css file is not writable. Please try again.</div>
            <script>
            	$().toastmessage('showErrorToast', "We do not allow you to save empty css files. Please check that your file is not empty. We also might not be able to write to it because you do not have write access. First check that what yopu are trying to save is not empty.");
            </script>
			<?php
			update_option('did_it_fail_to_update', '');
		}
		if(get_option('is_contents_same_as_options') == 'true'){
			?>
			<div class="noticeSave">We noticed that what you are trying to save and what we have saved previously is the exact same. 
            We did not bother to save this to the file because its the exact same.</div>
            <script>
            	$().toastmessage('showNoticeToast', "We did not save the contents of your input to the custom-css.css because what we have and what you have are the exact same thing.");
            </script>
			<?php
			update_option('is_contents_same_as_options', '');
		}
        ?>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <?php $aisis_forum_url = 'options.php?redirect_to=/wp-admin/admin.php?page=aisis-css-editor' ?>
        <form method="post" action="<?php echo $aisis_forum_url ?>">
        	<?php settings_fields( 'aisis-css-editor' ); ?>
        	<?php do_settings_fields('aisis-css-editor', 'aisis_css_editor_section'); ?>
            <input type="submit" id="published" name="published" value="Save CSS"/>
        </form>
        <div class="box">
        	<h1>Media Query Editor</h1>
            <p>Looking to edit your custom-media-query.css file? Make your changes bellow and hit submit. Whats saved here will change the look of your theme.</p>
        </div>
    	<div class="notice">Please note that editing this file will over write <strong>ANY</strong> changes you have made to this file. Always make a back up of this file first.</div>
        <?php $aisis_forum_url = 'options.php?redirect_to=/wp-admin/admin.php?page=aisis-css-editor' ?>
        <form method="post" action="<?php echo $aisis_forum_url ?>">
        	<?php settings_fields( 'aisis-css-editor' ); ?>
        	<?php do_settings_fields('aisis-css-editor', 'aisis_css_media_queary_editor_section'); ?>
            <input type="submit" id="published-media" name="published-media" value="Save Media Query" />
        </form>
  