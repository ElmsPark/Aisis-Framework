<?php
// Get the header
get_header();

// Set up the loop options array.
$options = array(
	'title_header' => 'h2',
	'post_before' => '<div class="marginBottom60">',
	'post_after' => '</div>',
	'image' => array(
		'size' => 'thumbnail',
		'args' => array(
			'align' => 'left',
			'class' => 'marginBottom20 marginRight20 thumbnail',
			'width' => '150',
			'height' => '76',
		)
	),
	'single' => array(
		'title_and_date' => array(
			'before' => '<div class="title">',
			'after' => '</div>'
		),
		'content' => array(
			'before' => '<div class="post">',
			'after' => '</div>'
		),			
		'show_categories' => true,
		'show_tags' => true,
		'image' => array(
			'size' => 'full',
			'args' => array(
				'align' => 'center',
				'class' => 'marginBottom20 marginTop20 thumbnail'
			)
		),
		'post_format' => array(
			'aside' => array(
				'before' => '<div class="post">',
				'after' => '</div>',
			),
			'quote' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),
			'status' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),
			'link' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),
			'chat' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),
			'image' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),	
			'gallery' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),
			'video' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),	
			'audio' => array(
					'before' => '<div class="post">',
					'after' => '</div>',
			),
		),
		'sticky_post' => array(
			'before' => '<div class="post sticky">',
			'after' => '</div>'
		),				
	),
	'page' => array(
		'content' => array(
			'before' => '<div class="post">',
			'after' => '</div>'
		),			
		'image' => array(
			'size' => 'full',
			'args' => array(
				'align' => 'center',
				'class' => 'marginBottom20 marginTop20 thumbnail'
			)
		),
	),
	'404_template' => '404',
);


// initialize the loop object
$loop = new CoreTheme_Templates_View_Helpers_CustomLoop($options);

// Set the sidebar
if(!is_home()){
	if(is_category()){
		$loop->sidebar('category_sidebar');
	}elseif(is_tag()){
		$loop->sidebar('tag_sidebar');
	}elseif(is_author()){
		$loop->sidebar('author_sidebar');
	}
}

// Create the builder object with all dependencies
$builder = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');

// Set up the sidebar wrapper
if(is_active_sidebar('aisis-side-bar') && !is_home()){
	if(!$builder->get_specific_option('category_sidebar') && is_category()){
		echo '<div class="span6 marginLeft50 marginTop60">';
	}elseif(!$builder->get_specific_option('tag_sidebar') && is_tag()){
		echo '<div class="span6 marginLeft50 marginTop60">';	
	}elseif(!$builder->get_specific_option('author_sidebar') && is_author()){
		echo '<div class="span6 marginLeft50 marginTop60">';
	}elseif(is_single()){
		echo '<div class="container-narrow marginTop60">';
	}elseif(is_page()){
		echo '<div class="container marginTop60">';
	}else{
		echo '<div class="marginTop60 marginBottom120">';
	}
}else{
	echo '<div class="marginTop60 marginBottom120">';	
}

// Call appropriate headers for category, tag and author archives.
new CoreTheme_Templates_View_Helpers_Header();

// Call the custom loop
$loop->custom_loop();

// Close all divs
echo '</div></div>';

//Get the footer.
get_footer();

