<?php
/**
 * This class implements the Activation interface and allows for you set up what is suppose to happen upon
 * activation of the theme.
 * 
 * @see AisisCore_Interfaces_Activation
 * @see CoreTheme_MultiSite
 * 
 * @package CoreTheme
 *
 */
class CoreTheme_Activation extends CoreTheme_MultiSite implements AisisCore_Interfaces_Activation{
	
	/**
	 * @var array
	 */
	protected $_errors = array();
	
	/**
     * @var array
	 */
	protected $_notices = array();
	
	/**
	 * @var array
	 */	
	protected $_options = array();
	
	/**
	 * Takes in a series of options in relation to any custom folders to make.
	 * 
	 * <p>custom/ is made upon activation of the theme, assuming you have file permission to do so.</p>
	 * 
	 * @param array $options
	 */	
	public function __constuct(array $options){
		$this->_options = $options;
		
		$this->init();
	}
	
	/**
	 * Over ride me when extending this class.
	 * 
	 * <p>All your constuctor logic should go here.</p>
	 */
	public function init(){}
	
	/**
	 * Sets up multi site as well.
	 * 
	 * @see AisisCore_Interfaces_Activation::on_activation()
	 */
	public function  on_activation(){
		$http = new AisisCore_Http_Http();
		if(is_admin() && $http->get_current_url() == admin_url('themes.php?activated=true')){
			if(!$this->create_components($this->_options)){
				$this->_notices['mk_dir'] = 'Could not create the custom folder or appropriate sub folders. Please check your permissions.';
			}
            //Request the custom functions.php if it exists
            if(!file_exists(CUSTOM . 'functions.php')){
                $this->_notice['file_not_found'] = 'Could not find the functions.php file in the custom folder. 
                    By default we do not create this. Consider creating one for custom modifications.';
            }else{
               require_once(CUSTOM . 'functions.php'); 
            }
            add_action('admin_notices', array($this, 'check_for_errors'));
			add_action('admin_notices', array($this, 'check_for_notices'));
		}
	}

	/**
	 * Errors are kepts as $key=>$value, or $error_type=>$message.
	 * 
	 * @see AisisCore_Interfaces_Activation::check_for_errors()
	 */
	public function check_for_errors(){
		if(isset($this->_errors) && !empty($this->_errors)){
			foreach($this->_errors as $error_type=>$message){
				echo '<div class="alert alert-error">'.$message.'</div>';
			}
		}
	}
	
	/**
	 * Notices are kepts as $key=>$value, or $error_type=>$message.
	 */	
	public function check_for_notices(){
		if(isset($this->_notices) && !empty($this->_notices)){
			foreach($this->_notices as $type=>$message){
				echo '<div class="alert">'.$message.'</div>';
			}
		}
	}	
}
