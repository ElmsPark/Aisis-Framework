<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is the core look and feel for the entire admin section.
	 *		from here we load individual registered admin modules that
	 *		then add to this page based on what page the user is on.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */
	 
	 //check theme version
	 $aisis_theme_version = get_theme_data(get_bloginfo('stylesheet_url'));
	 $aisis_check_version = new AisisUpdate();

?>

    <div id="adminPanelWrapper">
        <div class="adminPanelTitle">
            Aisis Core Theme Options
            <div class="adminPanelSubTitle">
                Aisis Core Version <?php echo $aisis_theme_version['Version']; ?>
            </div>
            <div class="upgradeNotice"><?php $aisis_check_version->check_current_version();?></div>
    	</div>
       

		<?php
        if(isset($_GET['page']) && $_GET['page'] == 'aisis-core-options'){
			aisis_admin_options_page();
		}
		else if(isset($_GET['page']) && $_GET['page'] == 'aisis-css-editor'){
			aisis_css_editor_page();
		}
		else if(isset ($_GET['page']) && $_GET['page'] == 'aisis-js-editor'){
			aisis_js_editor_page();
		}
		else if(isset ($_GET['page']) && $_GET['page'] == 'aisis-php-editor'){
			aisis_php_editor_page();
		}
		else if(isset ($_GET['page']) && $_GET['page'] == 'aisis-doc'){
			aisis_admin_doc_page();
		}
		?>
        <div class="adminFooter">(C) 2012 - GPL 3.0 - Adam Balan - </div>
    </div>