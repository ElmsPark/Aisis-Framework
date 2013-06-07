<?php
$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');

if($template->get_specific_option('posts_display') == 'regular_posts' && is_home()){
	echo '<div class="span6 marginPullRight50" id="sideBar">';
}else{
	echo '<div class="span6 marginPullRight50 marginTop60" id="sideBar">';
}

dynamic_sidebar('aisis-side-bar'); ?>
	
</div>