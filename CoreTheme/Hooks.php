<?php 
class CoreTheme_Hooks extends AisisCore_Hooks{
	
	public function init(){
		parent::init();
		
		$this->setup_hooks(array(
			'test' => array($this, 'sample_hook'),
		));
	}
	
	public function sample_hook($test){
		echo $test;
	}
}
