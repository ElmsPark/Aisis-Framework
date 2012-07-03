<?php
	/**
	 *
	 * ==================== [MAY EDIT - SEE BELLOW] ====================
	 *
	 *		This is the core and default header for the whole theme.
	 *		you may want to see the AisisCore package and associated
	 *		files. This is a file you can edit if you so desire.
	 *
	 *		@see AisisCore (package)
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis 
	 * =================================================================
	 */

  	
	$options = get_option('aisis_upload_header_image_setting');
	 
?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    
    <title>
    <?php 
    
        if(is_single()){
            single_post_title();
        }elseif(is_page() || is_front_page()){
            bloginfo('name');
        }elseif(is_page()){
            single_post_title('');
        }elseif(is_search()){
            bloginfo('name'); print '| Search Resualts: ' . esc_html($s);
        }elseif(is_404()){
            bloginfo('name'); print '| Not Found - 404 ';
        }else{
            bloginfo('name');
        }
    
    ?>
    </title>
    
    <?php wp_head();?>
    </head>
    
    <body>
    	<div id="pageWrap">
            <header id="header">
        		
                <hgroup>
                    <h1 id="siteLogo"><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></h1>
                </hgroup>
        		<?php //aisis_social_media(); ?>
                <nav>
                    <ul id="nav" class="clearfix">
                    <?php wp_nav_menu(array(
                        'fallback_cb' => 'aisis_default_main_nav',
                        'items_wrap' => '<li>%3$s</li>'
                    ));?>
                    </ul>
                </nav>
        
                <form method="get" id="searchForm" action="<?php echo home_url(); ?>/">
                    <input type="search" id="s" name="s"  placeholder="Search">
                </form>
        
            </header>