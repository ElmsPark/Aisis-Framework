<?php
class CoreTheme_Loader_Package extends AisisCore_Loader_Package {
	
	public function init(){
		$file_handler = new AisisCore_FileHandling_File();
		
		if(is_array($this->_packages)){
			foreach($this->_packages as $package){
				if($this->package_exists($package) && !$this->package_empty($package)){
					$file_handler->load_directory_of_files($package);
				}
			}
		}else{
			if($this->package_exists($this->_packages) && !$this->package_empty($this->_packages)){
				$file_handler->load_directory_of_files($this->_packages);
			}
		}
	}
	
}
