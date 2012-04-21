<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This file consists of all the basic theme functiosn that you
	 *		can change.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 * =================================================================
	 */
	 
	 $aisis_file_handeling = new AisisFileHandeling();
	 
	 if(isset($_POST['save'])){
		 
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
            You can make your changes bellow through each of the sections. 
            when you are satified with the changes please hit submit at the bottom of the page.
            You do not have to worry about losing data as you go through each of the sections selecting and making changes as you wish.
        </div>
        <h1>Responsive Image Slider Options</h1>
        <div class="notice">This Image loader uses WordPress image loader to load images that will ten be used for the image slider on your
        WordPress site.</div>
        <?php
		if(!$aisis_file_handeling->check_dir(IMAGES)){
			?> <div class="err">Please create an images folder before continueing and please make sure your images are in there.</div><?php
		}
        ?>
        <form method="post" action="<?php admin_url('admin-post.php?action=aisis_options') ?>">
        	<label>Image<input type="text" name="image1" id="image1" /></label>
            <label>Check the thumbs folder for the same images?<input type="checkbox" name="check" id="check" /></label>
            <input type="submit" value="save" name="save" id="save"/>
        </form>
    </div>