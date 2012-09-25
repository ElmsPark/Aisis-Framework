<?php
function core_aisis_css_editor(){		
  
  add_settings_field(
	'aisis_core_css',
	'',
	'aisis_css',
	'aisis-css-editor',
	'aisis_css_section'
  );  
  	
  
  register_setting('aisis-css-editor', 'aisis_core_css', 'aisis_css_validation');
}

function aisis_css(){
	$aisis_form = new AisisForm;
	$options = get_option('aisis_core_css');
	
	$aisis_form->create_aisis_form_element('textarea', array(
		'id' => 'code',
		'name' => 'aisis_core_css[css]',
		'value' => $options['css']
	));				
	
}

function aisis_css_validation($input){
	$aisis_css = get_option('aisis_core_cs');
	$aisis_file = new AisisFileHandling();
	if(trim($input['css']) != ''){
		if($aisis_file->write_to_file('custom-css.css', trim($input['css']), CUSTOM)){
			$aisis_css['css'] = trim($input['css']);
			update_option('aisis_css_update_message', 'pass');
			return $aisis_css;
		}else{
			update_option('aisis_css_update_message', 'fail');
		}
	}
}

add_option('aisis_css_update_message', '', '', 'yes');
add_action('admin_init', 'core_aisis_css_editor');

?>