<?php
function core_css_editor(){		
  
  add_settings_field(
	'aisis_core',
	'',
	'aisis_css_editor',
	'aisis-css-editor',
	'aisis_css_section'
  );  
  	
  
  register_setting('aisis-css-editor', 'aisis_core', 'aisis_css_validation');
}

function aisis_css_editor(){
	$aisis_form = new AisisForm;
	$options = get_option('aisis_core');

	$aisis_form->create_aisis_form_element('textarea', array(
		'id' => 'code',
		'name' => 'aisis_core[aisis_css]',
		'value' => get_css_code()
	));		
}

function aisis_css_validation($input){
	$aisis_file = new AisisFileHandling();
	$options = get_option('aisis_core');
	if(trim($input['aisis_css']) != ''){
		$options['aisis_css'] = trim($input['aisis_css']);
		if($aisis_file->write_to_file($aisis_file->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), 
		$options['aisis_css'], CUSTOM)){
			update_option('updated_file', 'true');
			return $options;
		}else{
			update_option('failed_update', 'true');
		}
	}else{
		update_option('failed_update', 'true');
	}
	
	update_option('admin_success_message', 'true'); 	
}


function get_css_code(){
	$aisis_file = new AisisFileHandling();
	
	$options = get_option('aisis_core');
	if($options['aisis_css'] != ''){
		return $options['aisis_css'];
	}else{
		return $aisis_file->get_contents(CUSTOM, 'custom-css.css');
	}
}

add_option('updated_file', '', '', 'yes');
add_option('failed_update', '', '', 'yes');

add_action('admin_init', 'core_css_editor');

?>