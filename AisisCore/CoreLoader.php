<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is the core loader that allows you to load files in 
	 *		in the Aisis Core. This file is then required in the 
	 *		functions.php of the core theme to load the entire
	 *		core and all associated files, functions and what not.
	 *
	 *		Do not in any way manipulate this file. Use the 
	 *      custom-functions.php file in the lib/custom to
	 *      load any other required files.
	 *
	 *		This file also cllas the LoadCustom.php to load all the
	 *		custom styles, js, php and more.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	 //Defaults - Core - Load it
	 require_once(AISISCORE . 'AisisCore.php');
	 require_once(AISISCORE . 'AisisHooks.php');
	 require_once(AISISCORE . 'Class-Aisis-File-Handeling.php');
	 require_once(AISISCORE . 'Class-Aisis-Core-Register.php');
	 require_once(AISISCORE . 'Class-Aisis-Update.php');
	 require_once(AISISCORE . 'AisisDebugger.php');

	 
	 //These are all the loaders
	 require_once(AISIS_EXCEPTIONS . 'ExceptionLoader.php');
	 require_once(AISIS_TEMPLATES . 'BuildAisisTheme.php');
	 
	 //Load short codes and set them up.
	 require_once(AISIS_SHORTCODES . 'Codes.php');
	 require_once(AISIS_SHORTCODES . 'AdminSetUpCodes.php');
	 
	 $aisis_load_admin_section= new AisisFileHandeling();
	 $aisis_load_admin_section->load_if_extension_is_php(AISIS_ADMINPANEL);
	 
	 
	 aisis_register_theme_activation_hook('Aisis', 'aisis_do_on_load');
	 
	 /**
	  * We need to set up the theme after activation
	  * essentially make sure files exists and what have you.
	  * we also check the options table and populate these files
	  * with any data from there, assuming data exists in theem.<br />
	  * this is done incase you upgrade the theme and your files are over written.
	  */
	  function aisis_do_on_load(){
		  if(get_option('theme_name_activation_check') != 'set'){
			  $errors = array();
			  $aisis_file_handeling = new AisisFileHandeling();
			  
			  if($aisis_file_handeling->check_dir(CUSTOM, true)){
				  if($aisis_file_handeling->check_exists('custom-css.css', true)){
					  $options = get_option('aisis_css_editor_setting');
					  if(isset($options['code']) && !empty($options['code'])){
						  //We need it to write to the proper place
						  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $options['code'], CUSTOM);
					  }
				  }
				  else{
					  $errors[] = "Seems that we cannot create your custom-css.css file. Please check your permissions.";
				  }
				  
				  if($aisis_file_handeling->check_exists('custom-media-query.css', true)){
					  $options = get_option('aisis_css_media_queary_css_editor_setting');
					  if(isset($options['media-code']) && !empty($options['code'])){
						  //We need it to write to the proper place
						  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-media-query.css', "css"), $options['media-code'], CUSTOM);
					  }
				  }else{
					  $errors[] = "Seems that we cannot create your custom-media-queary.css file. Please check your permissions.";
				  }
				  
				  if($aisis_file_handeling->check_exists('custom-functions.php', true)){
					  $options = get_option('aisis_php_editor_setting');
					  if(isset($options['aisis-php']) && !empty($options['aisis-php'])){
						  //We need it to write to the proper place
						  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-functions.php', "php"), $options['aisis-php'], CUSTOM);
					  }
				  }else{
					  $errors[] = "Seems that we cannot create your custom-functions.php file. Please check your permissions.";
				  }
				  
				  if($aisis_file_handeling->check_exists('custom-js.js', true)){
					  $options = get_option('aisis_js_editor_setting');
					  if(isset($options['aisis-js']) && !empty($options['aisis-js'])){
						  //We need it to write to the proper place
						  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-js.js', "js"), $options['aisis-js'], CUSTOM);
					  }
				  }else{
					  $errors[] = "Seems we cannot create your custom-js.js file. Please check your permissions";
				  }
				  
				  if(!empty($errors)){
					  foreach($errors as $error){
						  echo $error . "<br />";
					  }
					  echo "We could not load your LoadCustom.php because of the errors at hand.";
				  }else{
					  require_once('LoadCustom.php');
				  }
				  
			  }else{
				  $errors[] = "We cannot create your custom folder....Do you have appropriate permissions?";
				  foreach($errors as $error){
					  echo $error . "<br />";
				  }
				   update_option('theme_name_activation_check', 'set');
				  return false;
			  }
			  
			  update_option('theme_name_activation_check', 'set');
			  return true;
			  
				
		  }else{
			  require_once('LoadCustom.php');
		  }
	  }
	  
	  
	 
	 
	 
	 //Set up Jquery
	 if(!function_exists('aisis_jq_cdn')){
		 /**
		  * Why are we doing this? so we (Aisis) can use
		  * Jquery - any version - with out fear of breaking wordpress.
		  * This also allows us to Jquery with out the noConflict wrapper.
		  */
		 function aisis_jq_cdn(){
			 wp_deregister_script('jquery');
			 wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
			 wp_enqueue_script('jquery', false, true);
		 }
	 }else{
		 echo '<div class="ext">' . new OverRideException('<strong>Do not override the aisis_jq_cdn function. See Tracemessage -> </strong>') . '</div>';
	 }
	 add_action('wp_enqueue_scripts', 'aisis_jq_cdn');
	 
	 //Load Styles and Scripts
	 if(!function_exists('aisis_load_scripts_styles')){
		 /**
		  * These are default scripts and 
		  * styles loaded.
		  */
		 function aisis_load_scripts_styles(){
			wp_enqueue_style( 'core-styles', get_bloginfo('stylesheet_url')); //Load core styles
			wp_enqueue_style( 'mediaquery-css', get_template_directory_uri() . '/lib/mediaQueryCss/mquery.css'); //Load core Media Query
			wp_enqueue_style( 'googlefont-ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:300'); //Load Ubuntu Font
			wp_enqueue_style( 'tip-tip-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/tipTip.css'); //Load plugin css
			wp_enqueue_style( 'toastmessage-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/jquery.toastmessage.css'); //Load plugin css
			wp_enqueue_style( 'camera-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/camera.css'); //Load Camera css
			wp_enqueue_style( 'snipit-code-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/snipit.css'); //Load Snipit Css
			wp_enqueue_style( 'thickbox');
			wp_enqueue_script( 'main-site', get_template_directory_uri() . '/lib/Javascript/mainSite.js', array('jquery'), false, true ); //Load Core JS
			wp_enqueue_script( 'tip-tip', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.tipTip.minified.js', array('jquery'), false, true ); //Loadtip tip js
			wp_enqueue_script( 'toast', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.toastmessage.js', array('jquery'), false, true ); //Load toastmessage js
			wp_enqueue_script( 'jquery-mobile-customized', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.mobile.customized.min.js', array('jquery'), false, true );//Lod jquery mobile (customized)
			wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.easing.1.3.js', array('jquery'), false, true ); //Load Jquery Easing
			wp_enqueue_script( 'camera', get_template_directory_uri() . '/lib/Javascript/plugins/camera.min.js', array('jquery'), false, true );//Load Camera
			wp_enqueue_script( 'thickbox', WPINC . '/js/thickbox/thickbox.js', array('jquery'), false, true); //Load ThickBox
			wp_enqueue_script( 'snipit-code', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.snipit.js', array('jquery'), false, true ); //Load jquery snipit
			

			if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' );
			
		 }
	 }else{  echo '<div class="ext">' . new OverRideException('<strong>Do not override the aisis_load_scripts_styles function. See Tracemessage -> </strong>') . '</div>'; }
	 
	 add_action('wp_enqueue_scripts', 'aisis_load_scripts_styles');
	 
	 //Add the following:
	 if(!function_exists('aisis_lt_ie_nine')){
		 function aisis_lt_ie_nine(){
			 echo '<!-- html5.js for IE less than 9 and css3-mediaqueries.js for IE less than 9-->
					<!--[if lt IE 9]>
						<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
						<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
					<![endif]-->';
		 }
	 }
	 
	 add_action('wp_head', 'aisis_lt_ie_nine');
	
	//Add the follwoing:
	 if(!function_exists('aisis_viewport_tag')){ 
		 function aisis_viewport_tag(){
			 echo '<meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;">';
		 }
	 }
	 
	 add_action( 'wp_head', 'aisis_viewport_tag', 999 );
?>