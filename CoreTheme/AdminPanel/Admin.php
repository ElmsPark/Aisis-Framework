<?php
/**
 * @author Adam Balan
 *
 */
class CoreTheme_AdminPanel_Admin {

	/**
	 * @var array
	 */
	protected $_admin_options;
	
	/**
	 * @var array
	 */
	protected $_assets;
	
	/**
	 * 
	 * @param Mixed $options
	 * @param array $assets
	 * @throws AisisCore_Exceptions_Exception
	 */
	public function __construct(array $assets){
		if(!is_array($assets)){
			throw new AisisCore_Exceptions_Exception('assets need to be an array');
		}else{
			$this->_assets = $assets;
		}
		
		$this->_admin_options = get_option('aisis_core_admin');
		
		add_action('admin_head',  array ($this, 'asset_loader' ) );
	}
	
	/**
	 * 
	 */
	public function asset_loader(){
		foreach ( $this->_assets as $key => $value ) {
			// load all the css files
		    if (isset ( $this->_assets ['css'] )) {
		        foreach($this->_assets ['css'] as $k=>$v){
		        	//echo '<link rel="stylesheet" type="text/css" href="' .$v['path']. '">';
		        }
		    }
		    
			if (isset ( $this->_assets ['js'] )) {
		        foreach($this->_assets ['js'] as $k=>$v){
		            // echo '<script src="' .$v['path']. '">';
		        }
		    }
		}
	}
}
