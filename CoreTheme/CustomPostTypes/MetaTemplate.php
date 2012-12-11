<?php
/**
 * This class is used to register templates for use in
 * the custom post types when registering any meta boxes.
 * 
 * @author Adam Balan
 *
 */
class CoreTheme_CustomPostTypes_MetaTemplate extends AisisCore_Template_Builder {
	
	/**
	 * Register the mini feed template
	 * 
	 * @param string $template
	 */
	public function register_mini_feed_meta($template){
		$this->load_template($template);
	}
	
	/**
	 *
	 */
	public function add_meta_template_assets(){
		/*echo "<link rel='stylesheet' href=
			'".get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css'."' type='text/css' media='all' />";
		echo "<script src=
			'".get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js'."'></script";*/
	}
	
	/**
	 *
	 */
	public function remove_meta_template_assets(){
		remove_action('admin_head', array($this, 'meta_template_asset_loader'));
	}
	
	/**
	 *
	 */
	public function meta_template_asset_loader(){
		wp_enqueue_style('meta-css', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css');
		wp_enqueue_script('meta-js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js');
	}	
}