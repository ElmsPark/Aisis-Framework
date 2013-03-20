<?php
/**
 * This class deals with mutlti site installation and activation of this theme.
 * 
 * <p>This class will create approproiate fooldrs based on the multisite, so each site is different among
 * the rest.</p>
 *
 * @see AisisCore_Interfaces_MultiSite
 * @package CoreTheme
 */
class CoreTheme_MultiSite implements AisisCore_Interfaces_MultiSite{
	
	/**
	 * Basic contructor
	 */
	public function __construct(){}
	
	/**
	 * @see AisisCore_Interfaces_MultiSite::create_components()
	 * @return bool $created
	 */
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
