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
	 *		@package: AisisCore->AdminPanel
	 *
	 * =================================================================
	 */

?>

    <div id="adminPanelWrapper">
        <div class="adminPanelTitle">
            Aisis Core Theme Options
        </div>
        <div class="adminPanelSubTitle">
            Aisis Core Version 1.0
        </div>
        <div class="whiteSection">
            Make your changes bellow and then hit submit to save them.
        </div>
		<?php
        if(isset($_GET['page']) && $_GET['page'] == 'aisis_options'){
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
    </div>