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
	
	add_option('reset_message', '', '', 'yes');
	
	if($_POST['reset_options']){
		
		delete_option('aisis_core');
		
		if(does_plugin_exist('bbpress/bbpress')){
			delete_option('aisis_core_bbpress');
		}
		
		update_option('reset_message', 'true');
		
		unset($_POST['reset_options']);
	}
}

?>