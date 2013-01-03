<?php
/**
 * This class is designed to help build and render out
 * templates for the admin panel in Aisis.
 * 
 * @author Adam Balan
 * @see AisisCore_Template_Builder
 */
class CoreTheme_AdminPanel_TemplateBuilder extends AisisCore_Template_Builder {
	
	/**
	 * Render an admin panel template.
	 * 
	 * @param string $template
	 */
	public function render_template($template){
		$this->_register_template($template);
	}
}

?>