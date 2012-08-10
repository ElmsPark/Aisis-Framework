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
    	$option = get_option('aisis_upload_header_image_setting');
    ?>
    </title>
    
    <?php wp_head();?>
    </head>
    
    <body>
    	<div id="pageWrap">
            <header id="header">
        		
                <hgroup>
                    <div id="siteLogo">
                    <?php if(get_header_image() == ''){?>
                    <a href="<?php bloginfo('url')?>"><img src="<?php if($option['aisis_header_img'] != '')
					{echo $option['aisis_header_img'];}else{bloginfo('template_directory');?>/images/bridge.jpg<?php } ?>" />
                    </a>
                    <?php }else{
						?><a href="<?php bloginfo('url')?>">
                        <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" 
                        height="<?php echo get_custom_header()->height; ?>" /></a><?php
					}?></div>
                </hgroup>
        		<div class="socialMediaLink"><?php aisis_social_media(); ?></div>
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