<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is documentation page for Aisis. It displays all the docs
	 *		and appropriate links to any documentation out side the
	 *		theme admin section it's self.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */

?>

<div id="tabs">
	<ul>
    	<li><a href="#aisis">About Aisis</a></li>
        <li><a href="#aisisGit">Aisis and Git</a></li>
        <li><a href="#aisisAPI">Aisis API</a></li>
    </ul>
    <div id="aisis">
    <?php
	 $form = array(
	 	'id' => 'testId',
		'name' => 'testName',
		'method' => 'post'
	 );
	 
	 $form_button = array(
		'value' => 'Sample Button',
	 );
	 
	 $form_text_area = array(
	 	'value' => 'say what?'
	 );
	 
	 $contents = array(
	 	aisis_form_button($form_button),
	 );
	 
	 aisis_build_form($form, $contents)
	
	?>
    </div>
    <div id="aisisGit">
    </div>
    <div id="aisisAPI">
    API
    </div>
</div>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>