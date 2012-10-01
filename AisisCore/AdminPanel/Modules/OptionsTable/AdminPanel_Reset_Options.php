<?php

function reset_aisis_options_form(){
	$aisis_form = new AisisForm();
	
	reset_options();
	
	$aisis_form->open_form(array(
		'method' => 'post',
		'action' => ''
	));
	
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'submit',
		'name' => 'reset_options',
		'class' => 'jsEditorButton',
		'value' => 'Reset All Options'
	));
	
	$aisis_form->close_form();
}

function reset_options(){
	
	$aisis_core = get_option('aisis_core');
	$aisis_core_bbpress = get_option('aisis_core_bbpress');
	
	add_option('reset_message', '', '', 'yes');
	
	if($_POST['reset_options']){
		
		foreach($aisis_core as $key=>$value){
			$aisis_core[$key] = '';
		}
		
		if(does_plugin_exist('bbpress/bbpress')){
			foreach($aisis_core_bbpress as $key=>$value){
				$aisis_core_bbpress[$key] = '';
			}
		}
		
		update_option('reset_message', 'true');
	}
}

?>