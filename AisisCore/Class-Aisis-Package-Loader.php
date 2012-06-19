<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is Aisis Package Loader which just sais - load the packages
	 *		if they exist. These are all the core packages for Aisis. The
	 *		only pluggable function here that can be over ridden is the 
	 *		short codes package.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->custom	 
	 * =================================================================
	 */
	 
	 class AisisPackageLoader{
	 
		 private $aisis_file_handling;
		 
		 /**
		  * Load the aisis custom packages. Spazz out if it's not
		  * there. We can over ride this function.
		  */
		 function load_aisis_custom_packages(){
		 	$this->aisis_file_handling = new AisisFileHandling();
		 	if($this->aisis_file_handling->check_dir(CUSTOM_PACKAGES)){
		 		$this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files(CUSTOM_PACKAGES));
		 	}else{
		 		_e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the Aisis Custom Package: Aisis/custom/packages</strong>") . "</div>");
		 		exit;
		 	}
		 }		 
		 
		 /**
		  * Load the exceptions package. Spazz out if it's not
		  * there or we try to override this function.
		  */
		 function load_aisis_exceptions_package(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_EXCEPTIONS)){
				 $this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files(AISIS_EXCEPTIONS));
			 }else{
				 echo "Failed to load Aisis Exceptions Package.";
				 exit;
			 }
		 }
		 
		 /**
		  * Load the admin panel package. Spazz out if it's not
		  * there or we try to override this function.
		  */
		 function load_aisis_admin_panel_package(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_ADMINPANEL)){
				 $this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files(AISIS_ADMINPANEL));
			 }else{
				 _e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the Aisis Admin Exceptions Package: AdminPanel</strong>") . "</div>");
				 exit;
			 }
		 }
		 
		 /**
		  * Load the aisis view package. Spazz out if it's not
		  * there or we try to override this function.
		  */
		 function load_aisis_view_package(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_VIEW)){
				 $this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files(AISIS_VIEW));
			 }else{
				 _e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the Aisis View Package: AdminView</strong>") . "</div>");
				 exit;
			 }
		 }
		 
		 /**
		  * Load the aisis short codes package. Spazz out if it's not
		  * there. We can over ride this function.
		  */
		 function load_aisis_codes_package(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_SHORTCODES)){
				 $this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files(AISIS_SHORTCODES));
			 }else{
				 _e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the Aisis Short Codes package: ShortCodes</strong>") . "</div>");
				 exit;
			 }
		 }
		 
		 /**
		  * Load the aisis social media package. Spazz out if it's not
		  * there. We can over ride this function.
		  */
		 function load_aisis_social_media_package(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_SOCIAL)){
				 $this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files(AISIS_SOCIAL));
			 }else{
				 _e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the Aisis Social Media package: AisisSocialMedia</strong>") . "</div>");
				 exit;
			 }
		 }
		 
		 /**
		  * Load the aisis custom post types package. Spazz out if it's not
		  * there. We can over ride this function.
		  */		 
		 function load_aisis_custom_post_types_package(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_CUSTOM_POST_TYPES)){
				 $this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files(AISIS_CUSTOM_POST_TYPES));
			 }else{
				 _e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the Aisis Custom Post Types package: AisisCustomPostTypes</strong>") . "</div>");
				 exit;
			 }
		 }			 		 		 	 
		 
		 /**
		  * This is our helper function to allow you
		  * to load what ever package you want.
		  */
		 function load_aisis_package_helper($dir_of_package){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir($dir_of_package)){
				 $this->aisis_file_handling->aisis_register_security($this->aisis_file_handling->load_directory_of_files($dir_of_package));
			 }else{
				 _e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the package you want to load at the directory of: $dir_of_package </strong>") . "</div>"); 
			 }
		 }
	 
	 }
	 
	 //instantiate the class
	 $aisis_package_loader = new AisisPackageLoader();
	 //Load the packages, starting with 
	 //exceptions then doing top down.
	 $aisis_package_loader->load_aisis_exceptions_package();
	 $aisis_package_loader->load_aisis_admin_panel_package();
	 $aisis_package_loader->load_aisis_codes_package();
	 $aisis_package_loader->load_aisis_view_package();
	 $aisis_package_loader->load_aisis_social_media_package();
	 $aisis_package_loader->load_aisis_custom_packages();
?>