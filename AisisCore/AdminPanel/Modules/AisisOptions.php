<?php
	$aisis_file_handeling = new AisisFileHandeling();
	 
	if(!$aisis_file_handeling->check_dir(HEADER_IMAGES) && !$aisis_file_handeling->check_dir(IMAGE_THUMBS)){
		?> <div class="err">Please create an header images folder before trying to upload images. This folder should be, be default, at: Aisis/images/headerimages.
		Also please create a thumbs directory with in that folder: Aisis/images/thumbs.</div><?php
	}
	?>
	<form method="post" action="<?php admin_url('admin-post.php?action=aisis_options') ?>">
		<div class="contents">
			<div class="optionsSection">
				<h2>Upload an Image</h2>
				<p>Choose from your local disk the files you want uploaded. They will be displayed bellow.</p>
				<div class="section">
					<input type="button" value="Upload Images For Header" id="button-image-upload" />
				</div>
				<div class="notice">The following are images already in the folder.</div>
				<div class="images">
				<?php 
				$aisis_print_images_out = $aisis_file_handeling->aisis_get_dir(HEADER_IMAGES);
				$count = count($aisis_print_images_out);
				for($i = 0; $i<$count; $i++){
				?><div class="individualImage">
                	<img src="<?php echo get_template_directory_uri() . '/images/headerimages/' . $aisis_print_images_out[$i] ?>" width="100" height="100" />
					<p><input type="checkbox" name="checkbox-<?php echo $i;?>" id="checkbox-<?php echo $i;?>" /></p>
				  </div><?php
				}?>
                </div>
			</div>
		</div>
		<input type="submit" value="save" name="save" id="save"/>
	</form>