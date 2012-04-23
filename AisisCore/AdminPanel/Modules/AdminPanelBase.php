<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This file consists of a basic template to which we
	 *		load other modules in to create the page based on the
	 *		the page we are currently viewing.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
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
			aisis_site_options();
		}
		else if(isset($_GET['page']) && $_GET['page'] == 'aisis-css-editor'){
			aisis_admin_css_editor();
		}
		else if(isset ($_GET['page']) && $_GET['page'] == 'aisis-js-editor'){
			aisis_admin_js_editor();
		}
		else if(isset ($_GET['page']) && $_GET['page'] == 'aisis-php-editor'){
			aisis_admin_php_editor();
		}
		?>
    </div>