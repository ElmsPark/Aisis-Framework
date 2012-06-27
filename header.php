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
            bloginfo('name'); print '| Search Resualts: ' . wp_specialchars($s);
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
        <div class="socialMediaLink">
          <?php aisis_social_media(); ?>
        </div>
    <div id="navWrapper">
        <div id="center">
        <h1 id="siteLogoImage">
        <a href="<?php bloginfo('url');?>">
        	<?php if(isset($options['aisis_header_img'])){ ?>
        	<img src="<?php echo $options['aisis_header_img']; ?>" width="320" height="56" /></a></h1>
            <?php }else{
			?>
			<img src="<?php bloginfo('template_directory');?>/images/bridge.jpg" width="320" height="56" /></a></h1>
			<?php }?>
            <nav>
                <?php wp_nav_menu(array(
                    'fallback_cb' => 'aisis_default_main_nav',
                    'items_wrap' => '<ul>%3$s</ul>'
                ));?>
            </nav>
        </div>
    </div>
    
    <div id="pagewrap">
        <!-- /#header -->