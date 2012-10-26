<?php
//require the the custom loader
require_once(get_template_directory(). '/AisisCore/Aisis-Custom-Loader.php');

/**
 * We have documentation based on this
 * function. essentially we are just loading
 * all of core into the package.
 *
 * For more documentation see:
 *
 * http://aisis.adambalan.com/documentation/aisis-custom-loader/
 */
load_aisis_core();

/**
 * Remove the actions associated with the hook.
 */
remove_action('aisis_404_err_message','default_aisis_404_err_message');
remove_action('aisis_author_default_text','deafualt_aisis_author_default_text');
remove_action('aisis_category_default_text','default_aisis_category_default_text');

/**
 * We will assign new hooks. Keep in mind that
 * Aisis does have options for these where you can
 * put in your own text. For this purpose we 
 * just want to kep it simple.
 *
 * each of these hooks is also default text so if you 
 * have not filled in the category description box
 * or the author description box in the wordpress admin
 * then this text will apear.
 *
 */

function new_404_message(){
	echo "We have yet to find what you are looking for. Please try your search again.";
}

function new_author_default_text(){
	echo "This author is responsible for writing posts.";
}

function new_aisis_category_default_text(){
	echo "This is new text for the cateory you are viewing.";
}

/**
 * Add them to the actions.
 */
add_action('aisis_404_err_message','new_404_message');
add_action('aisis_author_default_text','new_author_default_text');
add_action('aisis_category_default_text','new_aisis_category_default_text');
?>