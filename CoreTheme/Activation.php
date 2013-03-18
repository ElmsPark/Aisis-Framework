<?php
class CoreTheme_Activation extends CoreTheme_MultiSite implements AisisCore_Interfaces_Activation{
	
	protected $_errors = array();
	
	protected $_options = array();
	
	public function __constuct(array $options){
		$this->_options = $options;
	}
	
	public function init(){}
	
	public function  on_activation(){
		$http = new AisisCore_Http_Http();
		if(is_admin() && $http->get_current_url() == admin_url('themes.php?activated=true')){
			if(!$this->create_components($this->_options)){
				$this->_errors['mk_dir'] = 'Could not create the custom folder or appropriate sub folders. Please check your permissions.';
			}
			add_action('admin_notices', array($this, 'check_for_errors'));
		}
	}

	public function check_for_errors(){
		if(isset($this->_errors) && !empty($this->_errors)){
			foreach($this->_errors as $error_type=>$message){
				echo '<div class="alert alert-error">'.$message.'</div>';
			}
		}
	}
}
