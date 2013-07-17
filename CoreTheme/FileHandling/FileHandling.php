<?php
/**
 * This class is used to get a list of all directories in the packages and themes directory.
 * 
 * <p>When the user uploads a package or a theme in Aisis Theme we will then parse
 * the themes or packages folder looking for sub folders that then contain specific files.
 * from there we will go and return an array of folders in the themes or packages folder
 * that are viable themes or packages the user can choose from to activate.</p>
 * 
 * @see AisisCore_FileHandling_File
 * @package CoreTheme_FileHandling
 */
class CoreTheme_FileHandling_FileHandling{
	
	/**
	 * @var AisisCore_FileHandling_File 
	 */
	private $_fileHandling = null;
	
	/**
	 * Set up an instance of the AisisCore_FileHandling_File file handeling
	 * class.
	 */
	public function __construct(){
		if(null === $this->_fileHandling){
			$this->_fileHandling = new AisisCore_FileHandling_File();
		}
		
		$this->init();
	}
	
	/**
	 * Use this as a constructor in any sub classes to follow.
	 */
	public function init(){}
	
	/**
	 * Search for any css file in the sub folder of themes.
	 * 
	 * @return array of directory paths
	 */
	public function search_for_themes(){
		return $this->_get_files('themes', 'css');
	}
	
	/**
	 * Search for any php file with the name Setup in the sub folder in packages.
	 * 
	 * @return array of directory paths
	 */
	public function search_for_packages(){
		return $this->_get_files('packages', 'php');
	}

	/**
	 * Parse in the folder and the type, looking for specific files.
	 * 
	 * <p>We parse in the name of the sub folder we search that folder for
	 * any sub folders then look in the root of those folders for specif file
	 * types like css or php (if php we use the name to look for Setup) and then
	 * return an array of usable directories that the user can choose from as their
	 * packages or themes to load.</p>
	 * 
	 * @param string $folder_name
	 * @param string $type
	 * @return array
	 */
	protected function _get_files($folder_name, $type){
		$actual_dir_to_use = array();
		$array_of_files[] = null;
        $temp_array = null;
		$path_info[] = null;
		
		$array_of_folders = array_filter(glob(CUSTOM . '/' .$folder_name. '/*'), 'is_dir');
		foreach($array_of_folders as $folders){
			$array_of_files = $this->_fileHandling->dir_tree($folders);
			if(isset($array_of_files) && !empty($array_of_files)){
				foreach($array_of_files as $files){
					$path_info = pathinfo($files);
					if($type == 'css'){
						if($path_info['extension'] == 'css'){
							$actual_dir_to_use[] = $folders;
						}
					}
					
					if($type == 'php'){
						if($path_info['filename'] == 'Setup' && $path_info['extension'] == 'php'){
                            $actual_dir_to_use[] = $folders;
						}
					}
				}
			}
			
			$array_of_files = array();
			$path_info = array();
		}
        
		return array_unique($actual_dir_to_use);		
	}
}