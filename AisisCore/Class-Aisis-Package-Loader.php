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
		  * Load the admin panel package. Spazz out if it's not
		  * there or we try to override this function.
		  */
		 function load_aisis_admin_panel_package(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_ADMINPANEL)){
				 $this->aisis_file_handling->load_directory_of_files(AISIS_ADMINPANEL);
			 }else{
				 echo new AisisCoreException('<p><strong>Fatal: </strong> Cannot find the package: </p>' . AISIS_ADMINPANEL);
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
				 $this->aisis_file_handling->load_directory_of_files(AISIS_VIEW);
			 }else{
				 echo new AisisCoreException('<p><strong>Fatal: </strong> Cannot find the package: </p>' . AISIS_VIEW);
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
				$this->aisis_file_handling->load_directory_of_files(AISIS_SHORTCODES);
			 }else{
				 echo new AisisCoreException('<p><strong>Fatal: </strong> Cannot find the package: </p>' . AISIS_SHORTCODES);
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
				$this->aisis_file_handling->load_directory_of_files(AISIS_SOCIAL);
			 }else{
				 echo new AisisCoreException('<p><strong>Fatal: </strong> Cannot find the package: </p>' . AISIS_SOCIAL);
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
				 $this->aisis_file_handling->load_directory_of_files(AISIS_CUSTOM_POST_TYPES);
			 }else{
				 echo new AisisCoreException('<p><strong>Fatal: </strong> Cannot find the package: </p>' . AISIS_CUSTOM_POST_TYPES);
				 exit;
			 }
		 }
		 
		 function load_aisis_bbpress(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_BBPRESS)){
				 $this->aisis_file_handling->load_directory_of_files(AISIS_BBPRESS);
			 }else{
				  echo new AisisCoreException('<p><strong>Fatal: </strong> Cannot find the package: </p>' . AISIS_BBPRESS);
				 exit;
			 }
		 }	
		 
		 function load_aisis_template_builder(){
			 $this->aisis_file_handling = new AisisFileHandling();
			 if($this->aisis_file_handling->check_dir(AISIS_TEMPLATE_BUILDER)){
				 $this->aisis_file_handling->load_directory_of_files(AISIS_TEMPLATE_BUILDER);
			 }else{
				  echo new AisisCoreException('<p><strong>Fatal: </strong> Cannot find the package: </p>' . AISIS_TEMPLATE_BUILDER);
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
				$this->aisis_file_handling->load_directory_of_files($dir_of_package);
			 }else{
				 _e("<div class='err'>" . new PackageNotFoundException("<strong>Cannot find the package you want to load at the directory of: $dir_of_package </strong>") . "</div>"); 
			 }
		 }
	 }
?>