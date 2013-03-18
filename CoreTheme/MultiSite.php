<?php

class CoreTheme_MultiSite implements AisisCore_Interfaces_MultiSite{
	
	
	public function __construct(){}
	
	public function create_components($options){
		global $blog_id;
		
		$created = false;
		
		$file = new AisisCore_FileHandling_File();
		if($blog_id >= 1 && $file->check_dir(CUSTOM, true)){
			if(is_array($this->_options) && !empty($this->_options)){
				foreach($this->_options as $folder_type=>$name){	
					$created = $file->check_dir(CUSTOM . $name);
				}
				
				return $created;
			}
		}else{
			return $created;
		}
	}
}
