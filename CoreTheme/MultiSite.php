<?php

class CoreTheme_MultiSite extends AisisCore_Interfaces_MultiSite{
	
	protected $_options;
	
	public function __construct($options){
		$this->_options = $options;
	}
	
	public function create_components(){
		global $blog_id;
		
		$file = new AisisCore_FileHandling_File();
		if($blog_id >= 1 && $file->check_dir(CUSTOM, true)){
			if(is_array($this->_options) && !empty($this->_options)){
				foreach($this->_options as $folder_type=>$name){	
					$file->check_dir(CUSTOM . $name);
				}
			}
		}else{
			throw new AisisCore_FileHandling_FileException('Cannot create: ' . CUSTOM . ' Please check your permissions.');
		}
	}
}
