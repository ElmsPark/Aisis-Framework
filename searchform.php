<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		The default Search form
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis 
	 * =================================================================
	 */
	 
	 $aisis_form = new AisisForm();
	 
	 $aisis_form->open_form(array(
	 		'method'=>'get',
	 		'action'=>home_url() . '/',
			'id'=>'searchform'
	 ));
	 
	 $aisis_form->create_aisis_form_element('input',array(
	 		'type'=>'search',
	 		'id' => 'search',
			'name' => 's',
			'placeholder' => 'search'
	 
	 ));
	 
	 $aisis_form->close_form();
?>
	
