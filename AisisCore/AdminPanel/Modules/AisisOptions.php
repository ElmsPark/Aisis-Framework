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
	 
	 $is_text_area_empty = false;
	 $did_we_complete_text = false;
	 
	 define('MAX_SIZE', 1024 * 50);
	 
	 if(isset($_POST['upload'])){
		 print '<pre>' . print_r($_FILES, 1) . '</pre>';
		 $file = str_replace(' ', '_', $_FILES['image_uploaded']['name']);
		 $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg','image/png');
		 if (in_array($_FILES['image_uploaded']['type'], $permitted) && $_FILES['image_uploaded']['size'] > 0 && $_FILES['image_uploaded']['size'] <= MAX_FILE_SIZE){
			 switch($_FILES['image_uploaded']['error']) {
				 case 0:
					if (!file_exists(UPLOAD_DIR . $file)) {
				  		$success = move_uploaded_file($_FILES['image_uploaded']['tmp_name'], HEADER_IMAGES . $file);
					}else {
				  		$result = 'A file of the same name already exists.';
					}
					if ($success) {
				  		$result = "$file uploaded successfully.";
					} else {
				  		$result = "Error uploading $file. Please try again.";
					}
					break;
			  		case 3:
			  		case 6:
			  		case 7:
			  		case 8:
						$result = "Error uploading $file. Please try again.";
					break;
			  		case 4:
						$result = "You didn't select a file to be uploaded.";
			 }
		  }else {
			$result = "$file is either too big or not an image.";
		}
	 }
	 
	 if(isset($_POST['defaults'])){
		 if($_POST['default404Err'] != '' && $_POST['default404Message'] != '' && $_POST['defaultAuthorText'] != '' 
		 			&& $_POST['defaultCategoryText'] != '' && $_POST['defaultFooterText'] != ''){
			 
			 function new_default_404_banner_message(){
				 _e($_POST['default404Err']);
			 }
			 
			 add_action('init', 'aisis_filter_hooks');
			 function aisis_filter_hooks() {
				 $aisis_is_needed = (true === true);
				 if ($aisis_is_needed) {
					 add_filter('aisis_404_err_message_banner', 'new_default_404_banner_message');
				 }
			 }
			 $did_we_complete_text = true;
			 
			}else{
				$is_text_area_empty = true;
			}
	 }

?>

<div class="box">
	<h1>Header Image's</h1>
    <p>Looking to chage the slider on the front of your blog? Uplaod your images here and watch the slider change!</p>
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
    	<form method="post" action="<?php admin_url('admin.php?page=aisis_options') ?>">
            <input type="file" formenctype="multipart/form-data" name="image_uploaded" />
            <input type="submit" value="Upload Image" name="upload" />
            <input type="hidden" value"<?php MAX_SIZE ?>" name="MAX_SIZE"/>
        </form>
        </div>
    </div>
</div>

<div class="box">
	<h1>Change Default Text</h1>
    <p>Looking to change some of the default text and options through out the theme?
    Edit the information bellow to change the default text through out the site.</p>
</div>

<div class="contents">
	<?php if($is_text_area_empty == true){
		?><div class="err">Seems that one your text feilds bellow is empty. We can't have that! Please make sure nothing is empty. 
        If you won't want to edit it, then don't change the default.</div>
		<script>
			  $().toastmessage('showErrorToast', "Seems you left one of the feilds bellow blank. We don't allow that. If you don't want to change the default text then please just leave it as is. If you don't want the text displayed at all please use the custom-functions.php to change the the appropriate hook.");
              </script><?php
	}
	
	if($did_we_complete_text == true){
	?><div class="success">Check out your site to see the changes to the default text!</div>
	  <script>
		$().toastmessage('showSuccessToast', "We have changed the default text for the various sections as shown bellow. Check out your site to see your changes.");
      </script><?php
	}?>
    <div class="notice">The following is a set of hooks that deisplay default content fopr things like authors and categories when the text for those have not been set. That is to say if an author does not set their bio then the <strong>aisis_author_default_text and aisis_loop_single_author_blurb_default</strong> will be used to display default text.</div>
	<div class="optionsSection">
        <form method="post" action="<?php admin_url('admin.php?page=aisis_options') ?>">
            <div class="greyBox">
                <div class="title">Default 404 err banner message</div>
                <p>The following hook(s) will be changed: <strong>aisis_404_err_message_banner</strong>. 
                Which in turn changes the default text in the 404 error banner text.</p>
            </div>
            <textarea name="default404Err" rows="4" cols="60"><?php aisis_404_err_message_banner(); ?></textarea><br />
            <div class="greyBox">
                <div class="title">Default 404 err banner message</div>
                <p>The following hook(s) will be changed: <strong>aisis_404_err_message</strong>. 
                Which in turn will change the default 404 error message that is displayed. 
                Yes you can use HTML here to style the header and the message.</p>
            </div>
            <textarea name="default404Message" rows="4" cols="60"><?php aisis_404_err_message(); ?></textarea><br />
            <div class="greyBox">
                <div class="title">Default 404 err banner message</div>
                <p>The following hook(s) will be changed: <strong>aisis_author_default_text and aisis_loop_single_author_blurb_default</strong>. 
                Which in turn changes the authors default text for the author page and the default author blurb at the bottom of the post.
                To change them individually please edit your custom-functions.php file. </p>
            </div>
            <textarea name="defaultAuthorText" rows="4" cols="60"><?php aisis_author_default_text(); ?></textarea><br />
            <div class="greyBox">
                <div class="title">Default 404 err banner message</div>
                <p>The following hook(s) will be changed: <strong>aisis_category_default_text</strong>. 
                Which in turn changes the default category text for when vieing posts under a category.</p>
            </div>
            <textarea name="defaultCategoryText" rows="4" cols="60"><?php aisis_category_default_text(); ?></textarea><br />
            <div class="greyBox">
                <div class="title">Default 404 err banner message</div>
                <p>The following hook(s) will be changed: <strong>aisis_default_footer_text</strong>. 
                Which in turn changes the default footer text.</p>
            </div>
            <textarea name="defaultFooterText" rows="4" cols="60"><?php aisis_default_footer_text(); ?></textarea><br />
            <input type="submit" value="Save Your Work!" name="defaults" />
        </form>
    </div>
</div>