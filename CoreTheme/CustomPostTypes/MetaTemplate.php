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
}