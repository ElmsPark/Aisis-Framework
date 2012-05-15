<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is the Aisis Options page which allows you to set options
	 *		for the theme that are more basic then the editors where you can
	 *		edit various files.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */

?>
<?php $aisis_forum_url = 'options.php?redirect_to=/wp-admin/admin.php?page=aisis-core-options' ?>
<form method="post" action="<?php echo $aisis_forum_url ?>">
<div id="coreTabs">
	<ul>
    	<li><a href="#aisis">Aisis Core Options</a></li>
        <li><a href="#aisisGit">Aisis General Options</a></li>
        <li><a href="#aisisAPI">Aisis Aditional</a></li>
    </ul>
    <div class="bottom"></div>
    <div id="aisis">
		<div class="box">
            <h1>Header Image's</h1>
            <p>Looking to chage the slider on the front of your blog? Uplaod your images here and watch the slider change!</p>
            <p><input type="submit" value="Save Your Work!" name="defaults" /></p>
        </div>
        
        <div class="contents">
            <div class="notice">
                When you upload an image using this uploader your images will be stored in <strong>Aisis/images/imageheaders</strong> 
                It is recomdended you also upload thumb nail size images of your main images for responsiveness.
                Header Images ar <strong>1200x800</strong> and thumbs are <strong>100x75</strong>.
            </div>
            
            <div class="optionsSection">
                <div class="contents">
                <div class="greyBox">
                    <p>If you are looking to upload an image that can be used as the slider image then please do so here. 
                    The images in the <strong>images/headerimages</strong> will be used. as well as the thumbs there. 
                    Its is adbvised you upload thumbs as well to allow for responsiveness in the slider.</p>
                </div>
                Something should go here
                </div>
            </div>
        </div>
        
        <div class="box">
            <h1>Change Default Text</h1>
            <p>Looking to change some of the default text and options through out the theme?
            Edit the information bellow to change the default text through out the site.</p>
            <p><input type="submit" value="Save Your Work!" name="defaults" /></p>
        </div>
        
        <div class="contents">
            <?php
            if(get_option('admin_404_banner_err_bool') == 'true' && get_option('admin_404_message_err_bool') == 'true' && get_option('admin_default_author_err_bool') == 'true' 
                && get_option('admin_default_cat_text_err_bool') == 'true' && get_option('admin_default_footer_text_err_bool') == 'true'){
                    ?>
                    <div class="success">We have successfully updated the site with new content that you have set bellow.</div>
                    <script>
                        $().toastmessage('showSuccessToast', "We have successfully updated the content on the site with the new content that you have set bellow.");
                    </script>
                    <?php
                    update_option('admin_404_banner_err_bool', '');
                    update_option('admin_404_message_err_bool', '');
                    update_option('admin_default_author_err_bool', '');
                    update_option('admin_default_cat_text_err_bool', '');
                    update_option('admin_default_footer_text_err_bool', '');
            }
            ?>
            <div class="notice">The following is a set of hooks that deisplay default content fopr things like authors and categories when the text for those have not been set. That is to say if an author does not set their bio then the <strong>aisis_author_default_text and aisis_loop_single_author_blurb_default</strong> will be used to display default text.</div>
            <div class="optionsSection">
                <?php settings_fields( 'aisis-core-options' ); ?>
                    <div class="greyBox">
                        <div class="title">Default 404 err banner message</div>
                        <p>The following hook(s) will be changed: <strong>aisis_404_err_message_banner</strong>. 
                        Which in turn changes the default text in the 404 error banner text.</p>
                    </div>
                   <?php do_settings_fields('aisis-core-options', 'aisis_default_404_banner_section');?><br />
                    <div class="greyBox">
                        <div class="title">Default 404 err message</div>
                        <p>The following hook(s) will be changed: <strong>aisis_404_err_message</strong>. 
                        Which in turn will change the default 404 error message that is displayed. 
                        Yes you can use HTML here to style the header and the message.</p>
                    </div>
                    <?php do_settings_fields('aisis-core-options', 'aisis_default_404_message_section');?><br />
                    <div class="greyBox">
                        <div class="title">Default Author Text & Blurb</div>
                        <p>The following hook(s) will be changed: <strong>aisis_author_default_text and aisis_loop_single_author_blurb_default</strong>. 
                        Which in turn changes the authors default text for the author page and the default author blurb at the bottom of the post.
                        To change them individually please edit your custom-functions.php file. </p>
                    </div>
                    <?php do_settings_fields('aisis-core-options', 'aisis_default_author_text_section');?><br />
                    <div class="greyBox">
                        <div class="title">Default Category Text</div>
                        <p>The following hook(s) will be changed: <strong>aisis_category_default_text</strong>. 
                        Which in turn changes the default category text for when vieing posts under a category.</p>
                    </div>
                    <?php do_settings_fields('aisis-core-options', 'aisis_default_category_text_section');?> <br />
                    <div class="greyBox">
                        <div class="title">Default Footer Text</div>
                        <p>The following hook(s) will be changed: <strong>aisis_default_footer_text</strong>. 
                        Which in turn changes the default footer text.</p>
                    </div>
                    <?php do_settings_fields('aisis-core-options', 'aisis_default_footer_text_section');?><br />
                    
                
            </div>
        </div>
   </div>
   <div id="aisisGit">
   </div>
   <div id="aisisAPI">
   </div>
</div>
</form>
<script>
	$(function() {
		$( "#coreTabs" ).tabs();
	});
</script>