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
	 
	 define('MAX_SIZE', 1024 * 50);
	 
	 if(isset($_POST['upload'])){
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
        <h2>Image Upload</h2>
        <p>If you would like to upload images for use as your header image on the front of the blog you can do so here.</p>
    	<form method="post" action="<?php admin_url('admin.php?page=aisis_options') ?>">
        <input type="file" name="image_uploaded" />
        <input type="submit" value="Upload Image" name="upload" />
        <input type="hidden" value"<?php MAX_SIZE ?>" name="MAX_SIZE"/>
        </form>
        </div>
    </div>
</div>